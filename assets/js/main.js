// /**
//  * Main JavaScript file.
//  */
import Navigation from "./navigation.js";
// import skipLinkFocus from './skip-link-focus-fix.js';

import smoothscroll from "smoothscroll-polyfill";

import RevealChildrenOf from "./blogAnimations";

import { clearFileInput } from "./helperFunctions";

// document.addEventListener( 'DOMContentLoaded', () => {

// 	skipLinkFocus();

// 	navigation.enableTouchFocus();
// } );

setTimeout(() => {
	cookiesNotification();
}, 1000);

const cookiesNotification = () => {
	const cookiesInfo = document.querySelector(".cookie-law-notification");
	const cookiesAcceptButton = document.querySelector("#cookie-law-button");

	if (localStorage.getItem("cookiesAreAccepted")) {
		return;
	} else {
		cookiesInfo.classList.add("cookies-notification-on");
		cookiesAcceptButton.addEventListener("click", () => {
			localStorage.setItem("cookiesAreAccepted", "1");
			cookiesInfo.classList.add("cookies-notification-off");
		});
		return;
	}
};

window.addEventListener("load", () => {
	let vh = window.innerHeight * 0.01;
	let fullVH = window.innerHeight;
	document.documentElement.style.setProperty("--vh", `${vh}px`);
	document.documentElement.style.setProperty("--fullVH", `${fullVH}px`);
});

window.addEventListener("resize", () => {
	let vh = window.innerHeight * 0.01;
	let fullVH = window.innerHeight;
	document.documentElement.style.setProperty("--vh", `${vh}px`);
	document.documentElement.style.setProperty("--fullVH", `${fullVH}px`);
});

document.addEventListener("DOMContentLoaded", event => {
	const myPreloader = document.querySelector(".my-preloader");
	const page = document.querySelector("#page");
	const singlePostWrapper = document.querySelector(".content__wrapper");
	const mainSlogan = document.querySelector("#mainSlogan");
	const allPostsHeader = document.querySelector(".blog-posts__header");

	setTimeout(() => {
		myPreloader.classList.add("my-preloader-off");
		singlePostWrapper
			? singlePostWrapper.classList.add("content__wrapper--up")
			: "";
	}, 1000);

	setTimeout(() => {
		myPreloader ? myPreloader.classList.add("my-preloader-none") : "";
		page ? page.classList.add("page-loaded") : "";

		const blogGrid = document.querySelector(".blog-grid");
		new RevealChildrenOf(blogGrid, 4);

		const jobOffersGrid = document.querySelector(".job-offers-grid");
		new RevealChildrenOf(jobOffersGrid, 4);

		const cookieLawDiv = document.querySelector("#cookie-law-div");
		cookieLawDiv ? cookieLawDiv.classList.add("page-loaded") : "";

		mainSlogan ? mainSlogan.classList.add("mainSlogan--up") : "";
		document.body.classList.contains("blog") && allPostsHeader
			? allPostsHeader.classList.add("allPostsHeader--up")
			: "";
	}, 1100);

	smoothscroll.polyfill();

	const scrollDown = document.querySelector(".scroll-down");
	const entryHeader = document.querySelector(".entry-header");
	if (scrollDown) {
		scrollDown.addEventListener("click", e => {
			window.scrollBy({
				top: entryHeader.clientHeight,
				behavior: "smooth"
			});
		});
	}

	const mainNavigation = document.querySelector(".main-navigation");
	const mainMenuContainer = document.querySelector(".menu-menu-1-container");

	const navigation = new Navigation(mainNavigation, mainMenuContainer);

	navigation.setupNavigation();

	const structureTab = document.querySelector(".structure");

	if (structureTab) {
		const allTabMenuPositions = document.querySelectorAll(
			".tab-menu__position"
		);

		allTabMenuPositions.forEach(menuTab => {
			menuTab.addEventListener("click", function() {
				let tabId = this.dataset.tab;
				let targetTab = document.querySelector(`#${tabId}`);

				let currentlyActiveMenuTab = document.querySelector(
					".tab-menu__position--active"
				);
				let currentlyActiveTab = document.querySelector(".tab--active");

				currentlyActiveMenuTab.classList.remove("tab-menu__position--active");
				this.classList.add("tab-menu__position--active");

				currentlyActiveTab.classList.remove("tab--active");
				currentlyActiveTab.classList.remove("tab--loaded");
				targetTab.classList.add("tab--active");

				setTimeout(() => {
					targetTab.classList.add("tab--loaded");
				}, 200);
			});
		});
	}

	const fileInput = document.querySelector("input[type=file]");
	const filenameContainer = document.querySelector("#filename");
	const dropzone = document.querySelector(".upload-file-label");

	const filename = document.createElement("P");

	fileInput.addEventListener("change", function() {
		filenameContainer.appendChild(filename);
		filename.innerText = fileInput.value.split("\\").pop();

		filename ? (removeFile.style.display = "block") : "";
	});

	fileInput.addEventListener("dragenter", function() {
		dropzone.classList.toggle("dragover");
	});

	fileInput.addEventListener("ondragend", function() {
		dropzone.classList.remove("dragover");
	});

	const removeFile = document.querySelector("#remove-file");

	removeFile.addEventListener("click", function() {
		console.log("test");
		clearFileInput(fileInput);

		filenameContainer.removeChild(filename);
		filename.innerText = "";
		this.style.display = "none";
	});
});
