$(document).ready(function() {
	let mainDiv = $('.main-div');
	let gameOver = false;
	let gameWin = false;
	let openCount = 0;
	let level = 12;
	let alertGameOver = $('#exampleModal');
	let alertGameWin = $('#exampleModal2');

	let checkOrFlag = true;
	let firstClick = true;
	let check = $('#2n');
	let flag = $('#1n');

	flag.on('click', function(el) {
		checkOrFlag = false;
		flag.removeClass('fo-flag');
		flag.addClass('fo-flag-active');
		check.removeClass('fo-flag-active');
		check.addClass('fo-flag');
	});

	check.on('click', function(el) {
		checkOrFlag = true;
		check.removeClass('fo-flag');
		check.addClass('fo-flag-active');
		flag.removeClass('fo-flag-active');
		flag.addClass('fo-flag');
	});

	let matrix = [];
	let size = 9;
	for(let i=0; i<size; i++) {
		matrix[i] = [];
		for(let j=0; j<size; j++) {
			matrix[i][j] = 0;
		}
	}


	//Creating bombs!
	let rc = '';
	let BombList = [];
	for(let i=0; i<level; i++) {
		let row = Math.floor(Math.random() * 9);
		let col = Math.floor(Math.random() * 9);
		rc = row + "-" + col;
		if(BombList.includes(rc)) {
			i--;
			continue;
		}
		BombList.push(rc);
		matrix[row][col] = '*';
	}



	for(let i=0; i<size; i++) {
		for(let j=0; j<size; j++) {
			checkIfBomb(matrix, i, j);
		}
	}

	for(let i=0; i<size; i++) {
		mainDiv.append(`<div class="i-${i} d-flex"></div>`)
		let secondDiv = $(`.i-${i}`);
		for(let j=0; j<size; j++) {
			secondDiv.append(`<div class="j-${j} block text-center close"><span class="text-sz" id='${i}${j}'>&nbsp;</span></div>`);
		}
	}

	$('.close').each(function (index) {
		$(this).mousedown(function(event) {
			let id = $(this).children('span')[0].id;
			let elemn = $(`#${id[0]}${id[1]}`);
			if(checkOrFlag) {
				if(elemn[0].innerHTML.length < 7) {
					open(matrix, +id[0], +id[1]);
				}
			} else {
				if(elemn[0].innerHTML.length > 7) {
					elemn[0].innerHTML = "&nbsp";
					elemn.parent('.block').removeClass('open');
					elemn.parent('.block').addClass('close');
				} else {
					if(elemn.parent('.block').hasClass('close')) {
						elemn[0].innerHTML = "<i class='icon-flag'></i>";
						elemn.parent('.block').addClass('open');
					}
				}
			}
		});
	});


	function checkIfBomb(matrix, i, j) {
		if(matrix[i][j] == '*') return;

		let bombsCount = 0;
		if(i+1 < size){
			if(matrix[i+1][j] == '*') bombsCount++;
		}
		if(j+1 < size) {
			if(matrix[i][j+1] == '*') bombsCount++;
		}
		if(i-1 > -1){ 
			if(matrix[i-1][j] == '*') bombsCount++;
		}
		if(j-1 > -1) { 
			if(matrix[i][j-1] == '*') bombsCount++;
		}
		if(i+1 < size && j+1 < size) {
			if(matrix[i+1][j+1] == '*') bombsCount++;
		}
		if(i-1 > -1 && j+1 < size) {
			if(matrix[i-1][j+1] == '*') bombsCount++;
		}
		if(i-1 > -1 && j-1 > -1) {
			if(matrix[i-1][j-1] == '*') bombsCount++;
		}
		if(i+1 < size && j-1 > -1) {
			if(matrix[i+1][j-1] == '*') bombsCount++;
		}
		matrix[i][j] = bombsCount;
	}

	function open(matrix, i, j) {
		if(gameOver || gameWin) return;
		let el = $(`#${i}${j}`);
		if(el.parent('.block').hasClass('close')) openCount++;
		el.parent('.block').removeClass('close');
		el.parent('.block').addClass('open');
		el[0].innerHTML = matrix[i][j] == '-' ? '&nbsp;' : matrix[i][j] == 0 ? '&nbsp;' : matrix[i][j];
		if(openCount == (size * size)- level) {alert('WIN'); gameWin = true;}

		if(matrix[i][j] == '*') {
			gameOver = true;
			alertGameOver.modal('toggle');
			el.parent('.block').addClass('game-over');
			return;
		}

		if(matrix[i][j] == 0) matrix[i][j] = '-';

		if(matrix[i][j] == '-') {
			if(i-1 > -1){
				if(matrix[i-1][j] == 0) {open(matrix, i-1, j);}
				else {openOne(matrix, i-1, j);}
			}
			if(i-1 > -1 && j+1 < size){
				if(matrix[i-1][j+1] == 0) { matrix[i-1][j+1] = '-'; open(matrix, i-1, j+1);}
				else {openOne(matrix, i-1, j+1);}
			}
			if(j+1 < size){
				if(matrix[i][j+1] == 0) { matrix[i][j+1] = '-'; open(matrix, i, j+1);}
				else {openOne(matrix, i, j+1);}
			}
			if(i+1 < size && j+1 < size){
				if(matrix[i+1][j+1] == 0) { matrix[i+1][j+1] = '-'; open(matrix, i+1, j+1);}
				else {openOne(matrix, i+1, j+1);}
			}
			if(i+1 < size){
				if(matrix[i+1][j] == 0) { matrix[i+1][j] = '-'; open(matrix, i+1, j);}
				else {openOne(matrix, i+1, j);}
			}
			if(i+1 < size && j-1 > -1){
				if(matrix[i+1][j-1] == 0) { matrix[i+1][j-1] = '-'; open(matrix, i+1, j-1);}
				else {openOne(matrix, i+1, j-1);}
			}
			if(j-1 > -1){
				if(matrix[i][j-1] == 0) { matrix[i][j-1] = '-'; open(matrix, i, j-1);}
				else {openOne(matrix, i, j-1);}
			}
			if(i-1 > -1 && j-1 > -1){
				if(matrix[i-1][j-1] == 0) { matrix[i-1][j-1] = '-'; open(matrix, i-1, j-1);}
				else {openOne(matrix, i-1, j-1);}
			}
		} else {
			openOne(matrix, i, j);
		}
	}


	function openOne(matrix, i, j) {
		if(gameOver || gameWin) return;
		let el = $(`#${i}${j}`);
		if(el.parent('.block').hasClass('close')) openCount++;
		el.parent('.block').removeClass('close');
		el.parent('.block').addClass('open');
		el[0].innerHTML = matrix[i][j] == '-' ? '&nbsp;' : matrix[i][j] == 0 ? '&nbsp;' : matrix[i][j];
		if(openCount == (size * size) - level) {alert('WIN'); gameWin = true;}
	}
});