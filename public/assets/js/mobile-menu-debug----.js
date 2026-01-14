/**
 * Debug utilities for Mobile Menu Fix
 * Utilidades de depuración para el arreglo del menú móvil
 */

(function() {
    'use strict';

    // Solo activar en desarrollo (cuando hay ?debug=1 en la URL)
    const urlParams = new URLSearchParams(window.location.search);
    const debugMode = urlParams.get('debug') === '1';

    if (!debugMode) return;

    // Console styling
    const consoleStyle = {
        info: 'background: #e3f2fd; color: #1976d2; padding: 2px 4px; border-radius: 2px;',
        success: 'background: #e8f5e8; color: #2e7d32; padding: 2px 4px; border-radius: 2px;',
        warning: 'background: #fff3e0; color: #f57c00; padding: 2px 4px; border-radius: 2px;',
        error: 'background: #ffebee; color: #d32f2f; padding: 2px 4px; border-radius: 2px;'
    };

    function debugLog(message, type = 'info') {
        console.log(`%c[Mobile Menu Debug] ${message}`, consoleStyle[type]);
    }

    // Debug panel creation
    function createDebugPanel() {
        if (document.getElementById('mobile-menu-debug')) return;

        const panel = document.createElement('div');
        panel.id = 'mobile-menu-debug';
        panel.innerHTML = `
            <div style="
                position: fixed; 
                top: 10px; 
                right: 10px; 
                background: rgba(0,0,0,0.8); 
                color: white; 
                padding: 10px; 
                border-radius: 5px; 
                font-family: monospace; 
                font-size: 12px; 
                z-index: 9999; 
                max-width: 300px;
                backdrop-filter: blur(5px);
            ">
                <h4 style="margin: 0 0 10px 0; color: #4CAF50;">📱 Mobile Menu Debug</h4>
                <div id="debug-info"></div>
                <div style="margin-top: 10px; display: flex; gap: 5px; flex-wrap: wrap;">
                    <button onclick="window.mobileMenuFix.reinit()" style="padding: 5px 10px; background: #2196F3; border: none; color: white; border-radius: 3px; cursor: pointer; font-size: 11px;">Reinit</button>
                    <button onclick="window.mobileMenuFix.closeAllSubmenus()" style="padding: 5px 10px; background: #FF9800; border: none; color: white; border-radius: 3px; cursor: pointer; font-size: 11px;">Close All</button>
                    <button onclick="toggleDebugPanel()" style="padding: 5px 10px; background: #9E9E9E; border: none; color: white; border-radius: 3px; cursor: pointer; font-size: 11px;">Hide</button>
                </div>
            </div>
        `;

        document.body.appendChild(panel);

        // Make panel draggable
        makeDraggable(panel.querySelector('div'));

        debugLog('Debug panel created', 'success');
    }

    // Make element draggable
    function makeDraggable(element) {
        let isDragging = false;
        let startX, startY, initialLeft, initialTop;

        element.addEventListener('mousedown', startDrag);
        element.addEventListener('touchstart', startDrag);

        function startDrag(e) {
            isDragging = true;
            const rect = element.getBoundingClientRect();
            initialLeft = rect.left;
            initialTop = rect.top;
            
            if (e.type === 'mousedown') {
                startX = e.clientX;
                startY = e.clientY;
            } else {
                startX = e.touches[0].clientX;
                startY = e.touches[0].clientY;
            }

            document.addEventListener('mousemove', drag);
            document.addEventListener('touchmove', drag);
            document.addEventListener('mouseup', stopDrag);
            document.addEventListener('touchend', stopDrag);
        }

        function drag(e) {
            if (!isDragging) return;

            let currentX, currentY;
            if (e.type === 'mousemove') {
                currentX = e.clientX;
                currentY = e.clientY;
            } else {
                currentX = e.touches[0].clientX;
                currentY = e.touches[0].clientY;
            }

            const deltaX = currentX - startX;
            const deltaY = currentY - startY;

            element.style.left = (initialLeft + deltaX) + 'px';
            element.style.top = (initialTop + deltaY) + 'px';
            element.style.right = 'auto';
            element.style.position = 'fixed';
        }

        function stopDrag() {
            isDragging = false;
            document.removeEventListener('mousemove', drag);
            document.removeEventListener('touchmove', drag);
            document.removeEventListener('mouseup', stopDrag);
            document.removeEventListener('touchend', stopDrag);
        }
    }

    // Update debug info
    function updateDebugInfo() {
        const infoElement = document.getElementById('debug-info');
        if (!infoElement) return;

        const status = window.mobileMenuFix ? window.mobileMenuFix.status() : null;
        const hasArrowElements = document.querySelectorAll('#sidebar-menu .has-arrow');
        const activeSubmenus = document.querySelectorAll('#sidebar-menu .mm-active');
        const visibleSubmenus = document.querySelectorAll('#sidebar-menu .sub-menu.mm-show');

        infoElement.innerHTML = `
            <div><strong>Screen:</strong> ${window.innerWidth}x${window.innerHeight}</div>
            <div><strong>Touch Device:</strong> ${status ? status.touchDevice : 'N/A'}</div>
            <div><strong>Mobile/Touch:</strong> ${status ? status.isMobileOrTouch : 'N/A'}</div>
            <div><strong>Fix Active:</strong> ${status ? status.isActive : 'N/A'}</div>
            <div><strong>Has-Arrow Elements:</strong> ${hasArrowElements.length}</div>
            <div><strong>Active Items:</strong> ${activeSubmenus.length}</div>
            <div><strong>Visible Submenus:</strong> ${visibleSubmenus.length}</div>
            <div><strong>Body Classes:</strong> ${Array.from(document.body.classList).join(', ')}</div>
        `;
    }

    // Toggle debug panel visibility
    window.toggleDebugPanel = function() {
        const panel = document.getElementById('mobile-menu-debug');
        if (!panel) return;
        
        const isVisible = panel.style.display !== 'none';
        panel.style.display = isVisible ? 'none' : 'block';
        debugLog(isVisible ? 'Debug panel hidden' : 'Debug panel shown', 'info');
    };

    // Monitor submenu clicks
    function monitorClicks() {
        document.addEventListener('click', function(e) {
            if (e.target.closest('#sidebar-menu .has-arrow')) {
                const target = e.target.closest('.has-arrow');
                const parentLi = target.closest('li');
                const menuText = target.querySelector('.menu-item')?.textContent || 'Unknown';
                
                debugLog(`Submenu clicked: "${menuText}"`, 'info');
                
                setTimeout(() => {
                    const isActive = parentLi.classList.contains('mm-active');
                    debugLog(`Submenu "${menuText}" is now: ${isActive ? 'OPEN' : 'CLOSED'}`, isActive ? 'success' : 'warning');
                    updateDebugInfo();
                }, 100);
            }
        });
    }

    // Monitor window resize
    function monitorResize() {
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                debugLog(`Window resized: ${window.innerWidth}x${window.innerHeight}`, 'info');
                updateDebugInfo();
            }, 250);
        });
    }

    // Initialize debug functionality
    function initDebug() {
        debugLog('Debug mode activated', 'success');
        
        createDebugPanel();
        updateDebugInfo();
        monitorClicks();
        monitorResize();

        // Update debug info periodically
        setInterval(updateDebugInfo, 2000);

        // Add keyboard shortcut (Ctrl/Cmd + D)
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'd') {
                e.preventDefault();
                toggleDebugPanel();
            }
        });

        debugLog('Debug utilities loaded. Press Ctrl/Cmd + D to toggle panel', 'info');
    }

    // Initialize when ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initDebug);
    } else {
        initDebug();
    }

})();
