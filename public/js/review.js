$(document).ready(function() {
	let bad = $('#bad');
	let normal = $('#normal');
	let amazing = $('#amazing');
	let raiting = $('#raiting');

	bad.on('click', function() {
		raiting.attr('value', 'Bad');
		console.log(raiting[0]);
		if(normal.children('a').hasClass('selected'))
			normal.children('a').removeClass('selected');
		if(amazing.children('a').hasClass('selected'))
			amazing.children('a').removeClass('selected');
		$(this).children('a').addClass('selected');
	});

	normal.on('click', function() {
		raiting.attr('value', 'Normal');
		if(bad.children('a').hasClass('selected'))
			bad.children('a').removeClass('selected');
		if(amazing.children('a').hasClass('selected'))
			amazing.children('a').removeClass('selected');
		$(this).children('a').addClass('selected');
	});

	amazing.on('click', function() {
		raiting.attr('value', 'Amazing');
		if(bad.children('a').hasClass('selected'))
			bad.children('a').removeClass('selected');
		if(normal.children('a').hasClass('selected'))
			normal.children('a').removeClass('selected');
		$(this).children('a').addClass('selected');
	});
});