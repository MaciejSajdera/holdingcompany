import isElementInViewport from "../js/helperFunctions";

document.addEventListener("DOMContentLoaded", event => {
	const blogGrid = document.querySelector(".blog-grid");
	const allBlogPosts = document.querySelectorAll(".blog-post");
	const postNavigation = document.querySelector(".post-navigation");

	//blog page
	blogGrid && allBlogPosts
		? [...allBlogPosts].map((post, i) => {
				console.log(post, i);
				post.style.transitionDelay = `${i / 2}s`;
				post.style.opacity = "1";
		  })
		: "";

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
