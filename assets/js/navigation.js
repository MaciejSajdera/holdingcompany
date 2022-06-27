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

				const allMenuLinks = this.menuContainer.querySelectorAll(
					".main-menu-bottom > li"
				);

				// console.log(this.menuContainer);

				// console.log(allMenuLinks);

				const background = document.querySelector(".dropdownBackground");

				allMenuLinks.forEach(link => {
					link.addEventListener("mouseenter", handleEnter);
				});

				function handleEnter(e) {
					// console.log(e.target);

					const submenu = this.querySelector(".sub-menu");

					if (!submenu) {
						return;
					}

					submenu.classList.add("sub-menu--expanded");
					this.classList.add("trigger-enter");

					setTimeout(
						() =>
							this.classList.contains("trigger-enter") &&
							this.classList.add("trigger-enter-active"),
						150
					);

					background.classList.add("open");

					const mainMenuTopContainer = document.querySelector(
						".menu-main-menu-top-container"
					);
					const mainMenuBottomContainer = document.querySelector(
						".menu-main-menu-bottom-container"
					);

					const dropdown = this.querySelector(".sub-menu");
					const dropdownCoords = dropdown.getBoundingClientRect();
					const mainMenuTopContainerCoords = mainMenuTopContainer.getBoundingClientRect();
					const mainMenuBottomContainerCoords = mainMenuBottomContainer.getBoundingClientRect();

					const coords = {
						height: dropdownCoords.height,
						width: dropdownCoords.width,
						top: mainMenuBottomContainerCoords.bottom - 10,
						left: dropdownCoords.left - mainMenuBottomContainerCoords.left
					};

					// console.log(`dropdownCoords.top${dropdownCoords.top}`);
					// console.log(
					// 	`mainMenuBottomContainerCoords.top${mainMenuBottomContainerCoords.top}`
					// );
					// console.log(
					// 	`mainMenuTopContainerCoords.top${mainMenuTopContainerCoords.top}`
					// );

					dropdown.style.setProperty(
						"top",
						`${coords.top - mainMenuBottomContainerCoords.height}px`
					);

					background.style.setProperty("width", `${coords.width}px`);
					background.style.setProperty("height", `${coords.height}px`);
					background.style.setProperty(
						"transform",
						`translate(${coords.left}px, ${coords.top}px)`
					);
				}

				allMenuLinks.forEach(link => {
					link.addEventListener("mouseleave", handleLeave);
				});

				function handleLeave(e) {
					const submenu = this.querySelector(".sub-menu");

					if (!submenu) {
						return;
					}

					submenu.classList.remove("sub-menu--expanded");
					this.classList.remove("trigger-enter");
					this.classList.remove("trigger-enter-active");

					background.classList.remove("open");
				}
			}
		};

		const mediaQueryDesktop = window.matchMedia("(min-width: 992px)");
		mediaQueryDesktop.addListener(handleDesktopChange);
		handleDesktopChange(mediaQueryDesktop);

		function handleMobileChange(e) {
			if (e.matches) {
				console.log("Media Query Mobile Matched!");

				const nav = document.querySelector(".main-menu-bottom--mobile");

				const allMenuItemsWithChildren = nav.querySelectorAll(
					".menu-item-has-children"
				);

				allMenuItemsWithChildren.forEach(item => {
					const link = item.querySelector("A");
					link.style.pointerEvents = "none";
				});

				// Flags
				let backButtonAppended = false;

				document.addEventListener("click", function(e) {
					// console.log(e.target);

					if (e.target.classList.contains("menu-item-has-children")) {
						const expandSubMenu = e.target.querySelector(".show-submenu");

						expandSubMenu.querySelector("#back-button")
							? expandSubMenu.querySelector("#back-button").remove()
							: "";

						const myBackButton = document.createElement("LI");
						myBackButton.id = "back-button";
						myBackButton.classList.add("back-button", "menu-item");

						const myBackButtonAnchor = document.createElement("A");
						myBackButtonAnchor.setAttribute("href", "#");
						myBackButtonAnchor.innerText =
							expandSubMenu.previousElementSibling.innerText;

						const myBackButtonSpan = document.createElement("SPAN");
						myBackButtonSpan.classList.add("hide-submenu");

						myBackButton.appendChild(myBackButtonAnchor);
						myBackButton.appendChild(myBackButtonSpan);

						const submenu = expandSubMenu.nextElementSibling;

						const appendButton = () => {
							if (!backButtonAppended) {
								submenu.appendChild(myBackButton);
								backButtonAppended = true;
							}
						};

						appendButton();

						submenu.classList.add("sub-menu--expanded");
					}

					if (e.target.classList.contains("back-button")) {
						const submenuExpanded = e.target.closest(".sub-menu--expanded");
						submenuExpanded.classList.remove("sub-menu--expanded");

						setTimeout(() => {
							e.target.remove();
						}, 100);

						backButtonAppended = false;
					} else {
						return;
					}
				});

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
