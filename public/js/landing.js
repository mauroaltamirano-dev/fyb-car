(() => {
    const header = document.querySelector('[data-header]');

    const toggle = document.querySelector('[data-menu-toggle]');
    const menu = document.querySelector('[data-menu]');
    const menuLabel = document.querySelector('[data-menu-label]');

    if (!toggle || !menu) {
        return;
    }

    const closeMenu = ({ restoreFocus = false } = {}) => {
        toggle.setAttribute('aria-expanded', 'false');
        menuLabel && (menuLabel.textContent = 'Abrir menú principal');
        menu.removeAttribute('data-open');
        header?.removeAttribute('data-menu-open');
        document.body.classList.remove('menu-open');

        if (restoreFocus) {
            toggle.focus();
        }
    };

    const openMenu = () => {
        toggle.setAttribute('aria-expanded', 'true');
        menuLabel && (menuLabel.textContent = 'Cerrar menú principal');
        menu.setAttribute('data-open', '');
        header?.setAttribute('data-menu-open', '');
        document.body.classList.add('menu-open');
    };

    toggle.addEventListener('click', () => {
        if (toggle.getAttribute('aria-expanded') === 'true') {
            closeMenu();
        } else {
            openMenu();
        }
    });

    menu.addEventListener('click', (event) => {
        if (event.target.closest('a')) {
            closeMenu();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
            closeMenu({ restoreFocus: true });
        }
    });

    document.addEventListener('click', (event) => {
        if (
            toggle.getAttribute('aria-expanded') === 'true'
            && !menu.contains(event.target)
            && !toggle.contains(event.target)
        ) {
            closeMenu();
        }
    });

    const desktopBreakpoint = window.matchMedia('(min-width: 60rem)');
    const handleBreakpoint = (event) => {
        if (event.matches) {
            closeMenu();
        }
    };

    desktopBreakpoint.addEventListener?.('change', handleBreakpoint);
})();
