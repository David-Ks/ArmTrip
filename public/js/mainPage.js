$(document).ready(function() {
	let $doc = $(document);
	let windowHeight = window.screen.height;
	let mainSection = $('.main-section');
	let secondSection = $('.first-stage');
	let headerColor = $('.my-bg-color');
	let mainGif1 = $('.main-gif-1');
	let forUOne = $('#ForU-1');
	let secondImageDiv = $('.img-second-div');
	let armImg = $('.arm-img-main');
	let marzDivs = $('.marz-div');

	let AnimationScrollFlag = true;

	forUOne.mouseover(function() {
		mainGif1.fadeIn();
		mainGif1.css('margin-left', '0');
		mainGif1.css('transform', 'rotate(10deg)');
		mainGif1.css('background-image', 'url("https://media.giphy.com/media/QaQWUg6Z0pDKF44ARn/giphy.gif")');
	}).mouseout(function() {
		mainGif1.css('margin-left', '100%');
		mainGif1.css('transform', 'rotate(180deg)');
	});

	let imageSlide = function() {
		let index = 0;
		let urls = [
			'https://cdn.tourradar.com/s3/tour/645x430/217908_60a26fbb3a4fe.jpg',
			'https://cdn.tourradar.com/s3/tour/645x430/219686_60e466bccfe83.jpg',
			'https://cdn.tourradar.com/s3/tour/645x430/214973_60472f235bef1.jpg',
			'https://cdn.tourradar.com/s3/tour/645x430/71702_169528d6.jpg'
		];

		setInterval(function() {
			if(window.screen.width > 1060) {
				secondImageDiv.css('animation-name', 'fadeInLeftImgSlide');
				secondImageDiv.css('margin-left', '0');
				secondImageDiv.css('transform', 'skew(-4deg)');
			}
			secondImageDiv.css('background-image', `url(${urls[index++]})`);

			setTimeout(function() {
				if(window.screen.width > 1060) {
					secondImageDiv.css('margin-left', '100%');
					secondImageDiv.css('transform', 'skew(4deg)');
					secondImageDiv.css('animation-name', 'none');
				}
			}, 3000);
			if(index == urls.length) index = 0;
		}, 6000);
	}
	imageSlide();

	let pageCount = 4;
	if(window.screen.width <= 460)
		pageCount = 1;
	if(window.screen.width <= 760)
		pageCount = 2;
	else if(window.screen.width < 1280)
		pageCount = 3;

	var splide = new Splide( '.splide', {
	  type    : 'loop',
	  perPage : pageCount,
	  autoplay: true,
	  focus   : 'center',
	});

	splide.mount();
});