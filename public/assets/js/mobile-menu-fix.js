/**
 * Mobile Menu Fix for MetisMenu
 * Soluciona el problema de los submenús que no se despliegan en dispositivos móviles
 */

(function() {
    'use strict';

    // Variable para controlar si el fix está activo
    let isFixActive = false;

    // Detectar dispositivo táctil y agregar clase al body
    function detectTouchDevice() {
        const isTouchDevice = ('ontouchstart' in window) ||
                             (navigator.maxTouchPoints > 0) ||
                             (navigator.msMaxTouchPoints > 0);
        
        if (isTouchDevice) {
            document.body.classList.add('touch-device');
        }
        
        return isTouchDevice;
    }

    // Función para detectar si es dispositivo móvil o táctil
    function isMobileOrTouch() {
        return window.innerWidth <= 991.98 || detectTouchDevice();
    }

    // Función para manejar el click en elementos con has-arrow
    function handleSubmenuClick(event) {
        const target = event.currentTarget;
        const parentLi = target.closest('li');
        const submenu = parentLi.querySelector('.sub-menu');

        if (!submenu) return;

        event.preventDefault();
        event.stopPropagation();

        // Toggle de la clase mm-active para el li padre
        const isActive = parentLi.classList.contains('mm-active');
        
        if (isActive) {
            // Cerrar el submenú
            parentLi.classList.remove('mm-active');
            submenu.classList.remove('mm-show');
            submenu.style.display = 'none';
        } else {
            // Cerrar otros submenús del mismo nivel
            const siblings = parentLi.parentElement.querySelectorAll('li.mm-active');
            siblings.forEach(function(sibling) {
                if (sibling !== parentLi) {
                    sibling.classList.remove('mm-active');
                    const siblingSubmenu = sibling.querySelector('.sub-menu');
                    if (siblingSubmenu) {
                        siblingSubmenu.classList.remove('mm-show');
                        siblingSubmenu.style.display = 'none';
                    }
                }
            });

            // Abrir el submenú actual
            parentLi.classList.add('mm-active');
            submenu.classList.add('mm-show');
            submenu.style.display = 'block';
        }

        // Agregar pequeño feedback haptic si está disponible
        if (navigator.vibrate && detectTouchDevice()) {
            navigator.vibrate(50);
        }
    }

    // Función para remover todos los event listeners
    function removeEventListeners() {
        const hasArrowLinks = document.querySelectorAll('#sidebar-menu .has-arrow');
        hasArrowLinks.forEach(function(link) {
            link.removeEventListener('click', handleSubmenuClick);
            link.removeEventListener('touchstart', handleSubmenuClick);
        });
        isFixActive = false;
    }

    // Función para agregar event listeners
    function addEventListeners() {
        if (isFixActive) return;

        const hasArrowLinks = document.querySelectorAll('#sidebar-menu .has-arrow');
        hasArrowLinks.forEach(function(link) {
            // Agregar event listeners
            link.addEventListener('click', handleSubmenuClick, { passive: false });
            
            // Agregar soporte para touchstart en dispositivos táctiles
            if (detectTouchDevice()) {
                link.addEventListener('touchstart', handleSubmenuClick, { passive: false });
            }
        });

        isFixActive = true;
        console.log('Mobile menu fix activated for', hasArrowLinks.length, 'submenu items');
    }

    // Función para inicializar el fix según el tamaño de pantalla
    function initMobileMenuFix() {
        if (isMobileOrTouch()) {
            addEventListeners();
        } else {
            removeEventListeners();
        }
    }

    // Función para manejar resize con debounce
    function handleResize() {
        clearTimeout(window.mobileMenuResizeTimeout);
        window.mobileMenuResizeTimeout = setTimeout(function() {
            initMobileMenuFix();
        }, 250);
    }

    // Función para cerrar submenús cuando se hace click fuera
    function handleClickOutside(event) {
        if (!isMobileOrTouch()) return;

        const sidebar = document.getElementById('sidebar-menu');
        const sidebarContainer = document.querySelector('.vertical-menu');
        
        if (!sidebar || 
            sidebar.contains(event.target) || 
            sidebarContainer.contains(event.target) ||
            event.target.classList.contains('vertical-menu-btn') ||
            event.target.closest('.vertical-menu-btn')) {
            return;
        }

        // Cerrar todos los submenús activos
        const activeItems = sidebar.querySelectorAll('.mm-active');
        activeItems.forEach(function(item) {
            item.classList.remove('mm-active');
            const submenu = item.querySelector('.sub-menu');
            if (submenu) {
                submenu.classList.remove('mm-show');
                submenu.style.display = 'none';
            }
        });
    }

    // Función para observar cambios en el DOM
    function observeMenuChanges() {
        const sidebar = document.getElementById('sidebar-menu');
        if (!sidebar) return;

        const observer = new MutationObserver(function(mutations) {
            let shouldReinit = false;
            mutations.forEach(function(mutation) {
                if (mutation.type === 'childList') {
                    // Se agregaron o removieron elementos del menú
                    shouldReinit = true;
                }
            });

            if (shouldReinit) {
                setTimeout(initMobileMenuFix, 100);
            }
        });

        observer.observe(sidebar, {
            childList: true,
            subtree: true
        });
    }

    // Función de inicialización principal
    function initialize() {
        // Detectar dispositivo táctil al inicio
        detectTouchDevice();

        // Esperar a que el DOM esté completamente cargado
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    initMobileMenuFix();
                    observeMenuChanges();
                }, 200); // Delay para asegurar que MetisMenu esté inicializado
            });
        } else {
            setTimeout(function() {
                initMobileMenuFix();
                observeMenuChanges();
            }, 200);
        }

        // Escuchar cambios de tamaño de ventana
        window.addEventListener('resize', handleResize);

        // Escuchar clicks fuera del sidebar
        document.addEventListener('click', handleClickOutside);
        document.addEventListener('touchstart', handleClickOutside, { passive: true });
    }

    // Inicializar
    initialize();

    // Funciones globales para desarrollo/debug
    window.mobileMenuFix = {
        reinit: function() {
            initMobileMenuFix();
        },
        status: function() {
            return {
                isActive: isFixActive,
                isMobileOrTouch: isMobileOrTouch(),
                touchDevice: detectTouchDevice(),
                screenWidth: window.innerWidth
            };
        },
        closeAllSubmenus: function() {
            const sidebar = document.getElementById('sidebar-menu');
            if (!sidebar) return;
            
            const activeItems = sidebar.querySelectorAll('.mm-active');
            activeItems.forEach(function(item) {
                item.classList.remove('mm-active');
                const submenu = item.querySelector('.sub-menu');
                if (submenu) {
                    submenu.classList.remove('mm-show');
                    submenu.style.display = 'none';
                }
            });
        }
    };

})();
