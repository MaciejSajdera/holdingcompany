/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

export default class NavigationDesktop {
	constructor(navigationWrapper, menuContainer) {
		this.navigationWrapper = navigationWrapper;
		this.menuContainer = menuContainer;
		this.button = this.navigationWrapper.querySelector(".menu-toggle");
		this.menu = this.menuContainer.querySelector(".menu");
	}

	setupNavigation() {
		//Show menu after .scroll-down is passed
		const target = document.querySelector(".scroll-down");
		const element = this.menuContainer;

		function callbackScrollUpArrow(entries, observer) {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					element.classList.remove("navigation__toggled");
				} else {
					element.classList.add("navigation__toggled");
				}
			});
		}

		let optionsScrollUpArrow = {
			root: document.querySelector("#scrollArea"),
			rootMargin: "100px",
			threshold: 0.7
		};

		let observerScrollUpArrow = new IntersectionObserver(
			callbackScrollUpArrow,
			optionsScrollUpArrow
		);

		if (target) {
			observerScrollUpArrow.observe(target);
		}
	}
}
