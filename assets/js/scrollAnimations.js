import isElementInViewport from "../js/helperFunctions";

document.addEventListener("DOMContentLoaded", event => {
	const blogGrid = document.querySelector(".blog-grid");
	const lastBlogPost = document.querySelector(".blog-post");
	const allBlogPosts = document.querySelectorAll(".blog-post");

	// allBlogPosts && isElementInViewport(lastBlogPost)
	// 	? [...allBlogPosts].map((post, i) => {
	// 			post.style.transitionDelay = `${i / 3}s`;
	// 			post.style.opacity = "1";
	// 	  })
	// 	: "";

	const onScrollAnimations = () => {
		const blogPostsHeader = document.querySelector(".blog-posts__header");
		const mediaPostsHeader = document.querySelector(".media-posts__header");
		const contactSectionHeader = document.querySelector(
			".contact-section__header"
		);

		if (blogPostsHeader) {
			isElementInViewport(blogPostsHeader)
				? blogPostsHeader.classList.add("allPostsHeader--up")
				: "";
		}

		// if (mediaPostsHeader) {
		// 	isElementInViewport(mediaPostsHeader)
		// 		? mediaPostsHeader.classList.add("allPostsHeader--up")
		// 		: "";
		// }

		blogGrid && isElementInViewport(blogGrid) && allBlogPosts
			? [...allBlogPosts].map((post, i) => {
					post.style.transitionDelay = `${i / 3}s`;
					post.style.opacity = "1";
			  })
			: "";
	};

	blogGrid && isElementInViewport(blogGrid) ? onScrollAnimations() : "";
	document.addEventListener("scroll", onScrollAnimations);
});
