import isElementInViewport from "../js/helperFunctions";

export default class RevealChildrenOf {
	constructor(elementsParent, delayTime) {
		this.elementsParent = elementsParent;
		this.delayTime = delayTime;

		if (!elementsParent) {
			return;
		}

		this.hide();

		isElementInViewport(this.elementsParent)
			? this.reveal()
			: document.addEventListener("scroll", () => {
					this.reveal();
			  });
	}

	hide() {
		this.elementsParent.children
			? [...this.elementsParent.children].map((element, i) => {
					element.style.opacity = "0";
			  })
			: "";
	}

	reveal() {
		isElementInViewport(this.elementsParent) && this.elementsParent.children
			? [...this.elementsParent.children].map((element, i) => {
					// element.style.transition = `all 0.${this.delayTime}s ease-in`;
					element.style.transitionDelay = `${i / this.delayTime}s`;
					element.style.opacity = "1";
			  })
			: "";
	}
}

document.addEventListener("DOMContentLoaded", event => {
	// const blogGrid = document.querySelector(".blog-grid");
	// const allBlogPosts = document.querySelectorAll(".blog-post");
	const postNavigation = document.querySelector(".post-navigation");

	//blog page
	// blogGrid && allBlogPosts
	// 	? [...allBlogPosts].map((post, i) => {
	// 			console.log(post, i);
	// 			post.style.transitionDelay = `${i / 2}s`;
	// 			post.style.opacity = "1";
	// 	  })
	// 	: "";

	//single post page
	setTimeout(() => {
		postNavigation && isElementInViewport(postNavigation)
			? postNavigation.classList.add("post-navigation--wide")
			: "";
	}, 800);

	const singleAnimationsSinglePost = () => {
		postNavigation && isElementInViewport(postNavigation)
			? postNavigation.classList.add("post-navigation--wide")
			: "";
	};

	postNavigation && isElementInViewport(postNavigation)
		? singleAnimationsSinglePost()
		: "";
	document.addEventListener("scroll", singleAnimationsSinglePost);
});
