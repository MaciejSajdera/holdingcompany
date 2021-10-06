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
		this.svgButton = document.querySelector("#svgButton");
	}

	setupNavigation() {
		//Show menu after target is passed
		const target = document.querySelector("#my-page-header");
		const element = this.menuContainer;

		const callbackWelcomeView = (entries, observer) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					this.button.querySelectorAll(".line").forEach(line => {
						line.style.stroke = "#fff";
					});
				} else {
					this.button.querySelectorAll(".line").forEach(line => {
						line.style.stroke = "#000";
					});
				}
			});
		};

		let optionsWelcomeView = {
			root: document.querySelector("#scrollArea"),
			rootMargin: "0px",
			threshold: 0.1
		};

		let observerWelcomeView = new IntersectionObserver(
			callbackWelcomeView,
			optionsWelcomeView
		);

		const handleDesktopChange = e => {
			if (e.matches) {
				console.log("Media Query Desktop Matched!");

				if (target) {
					observerWelcomeView.disconnect();
				}

				var lastScrollTop = 0;

				// element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.
				window.addEventListener(
					"scroll",
					() => {
						// or window.addEventListener("scroll"....
						var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
						if (st > lastScrollTop) {
							this.navigationWrapper.classList.add("main-navigation__active");
							element.classList.add("navigation__toggled");
						} else {
							this.navigationWrapper.classList.remove(
								"main-navigation__active"
							);
							element.classList.remove("navigation__toggled");
						}
						lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
					},
					false
				);
			}
		};

		const mediaQueryDesktop = window.matchMedia("(min-width: 992px)");
		mediaQueryDesktop.addListener(handleDesktopChange);
		handleDesktopChange(mediaQueryDesktop);

		function handleMobileChange(e) {
			if (e.matches) {
				console.log("Media Query Mobile Matched!");

				if (document.querySelector("BODY").classList.contains("home")) {
					observerWelcomeView.observe(target);
				}
			}
		}

		const mediaQueryMobile = window.matchMedia("(max-width: 992px)");
		mediaQueryMobile.addListener(handleMobileChange);
		handleMobileChange(mediaQueryMobile);

		if (this.button) {
			this.button.addEventListener("click", e => {
				this.svgButton.classList.toggle("active");
				this.navigationWrapper.classList.toggle("navigation-wrapper__toggled");
				this.menuContainer.classList.toggle("navigation__toggled");
			});
		}


	}
}
