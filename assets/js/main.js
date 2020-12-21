// /**
//  * Main JavaScript file.
//  */
// import Navigation from './navigation.js';
// import skipLinkFocus from './skip-link-focus-fix.js';

import smoothscroll from "smoothscroll-polyfill";

// document.addEventListener( 'DOMContentLoaded', () => {
// 	const navigation = new Navigation();

// 	skipLinkFocus();

// 	navigation.setupNavigation();
// 	navigation.enableTouchFocus();
// } );

window.addEventListener("resize", () => {
	let vh = window.innerHeight * 0.01;
	document.documentElement.style.setProperty("--vh", `${vh}px`);
});

document.addEventListener("DOMContentLoaded", event => {
	const myPreloader = document.querySelector(".my-preloader");
	const page = document.querySelector("#page");
	const singlePostWrapper = document.querySelector(".single-post__wrapper");
	const mainSlogan = document.querySelector("#mainSlogan");
	const allPostsHeader = document.querySelector(".blog-posts__header");

	setTimeout(() => {
		myPreloader.classList.add("my-preloader-off");
		singlePostWrapper
			? singlePostWrapper.classList.add("single-post__wrapper--up")
			: "";
	}, 1000);

	setTimeout(() => {
		myPreloader ? myPreloader.classList.add("my-preloader-none") : "";
		page ? page.classList.add("page-loaded") : "";

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

	// const cookieInfoText = document.querySelector("#cookie-text").innerHTML;

	// let cookieLaw = {
	// 	dId: "cookie-law-div",
	// 	bId: "cookie-law-button",
	// 	iId: "cookie-law-item",
	// 	show: function(e) {
	// 		if (localStorage.getItem(cookieLaw.iId)) return !1;
	// 		var o = document.createElement("div"),
	// 			i = document.createElement("p"),
	// 			t = document.createElement("button");
	// 		(i.innerHTML = e.msg),
	// 			(t.id = cookieLaw.bId),
	// 			(t.innerHTML = e.ok),
	// 			(o.id = cookieLaw.dId),
	// 			o.appendChild(t),
	// 			o.appendChild(i),
	// 			document.body.insertBefore(o, document.body.lastChild),
	// 			t.addEventListener("click", cookieLaw.hide, !1);
	// 	},
	// 	hide: function() {
	// 		(document.getElementById(cookieLaw.dId).outerHTML = ""),
	// 			localStorage.setItem(cookieLaw.iId, "1");
	// 	}
	// };
	// cookieLaw.show({
	// 	msg: cookieInfoText,
	// 	ok: "Nie pokazuj więcej"
	// });
});
