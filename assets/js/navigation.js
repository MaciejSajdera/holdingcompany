/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

export default class Navigation {
	constructor(navigationWrapper, menuContainer) {
		this.navigationWrapper = navigationWrapper;
		this.menuContainer = menuContainer;
		this.button = this.navigationWrapper.querySelector(".menu-toggle");
		this.menu = this.menuContainer.querySelector(".menu");
	}

	setupNavigation() {
		//Show menu after target is passed
		const target = document.querySelector(".site-header");
		const element = this.menuContainer;

		const callbackScrollUpArrow = (entries, observer) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					this.navigationWrapper.classList.remove("main-navigation__active");
					element.classList.remove("navigation__toggled");
				} else {
					this.navigationWrapper.classList.add("main-navigation__active");
					element.classList.add("navigation__toggled");
				}
			});
		};

		let optionsScrollUpArrow = {
			root: document.querySelector("#scrollArea"),
			rootMargin: "0px",
			threshold: 0.1
		};

		let observerScrollUpArrow = new IntersectionObserver(
			callbackScrollUpArrow,
			optionsScrollUpArrow
		);

		function handleDesktopChange(e) {
			if (e.matches && target) {
				console.log("Media Query Mobile Matched!");
				observerScrollUpArrow.observe(target);
			}
		}

		const mediaQueryDesktop = window.matchMedia("(min-width: 992px)");
		mediaQueryDesktop.addListener(handleDesktopChange);
		handleDesktopChange(mediaQueryDesktop);

		function handleMobileChange(e) {
			if (e.matches) {
				console.log("Media Query Mobile Matched!");
				observerScrollUpArrow.disconnect();
			}
		}

		const mediaQueryMobile = window.matchMedia("(max-width: 992px)");
		mediaQueryMobile.addListener(handleMobileChange);
		handleMobileChange(mediaQueryMobile);

		this.button.addEventListener("click", e => {
			console.log(e);
			this.navigationWrapper.classList.toggle("navigation-wrapper__toggled");
			this.menuContainer.classList.toggle("navigation__toggled");
		});
	}
}
