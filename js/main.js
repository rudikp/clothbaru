var QuestionSlide = {
	position: 1,
	totalSlide: function() {
		return $('#total-slide').attr('data-value');
	},
	prev: function(){
		var prevButton = $('#prev');
		var nextButton = $('#next');
		var	slidePertanyaan = $('#slide-pertanyaan');

		slidePertanyaan.cycle('prev');

		nextButton.removeClass('disabled');

		this.position--;

		if (this.position == 1) {
			prevButton.addClass('disabled');
		}

		console.log(this.position);
	},
	next: function(){
		var prevButton = $('#prev');
		var nextButton = $('#next');
		var	slidePertanyaan = $('#slide-pertanyaan');

		var atLeastOneIsChecked = $('#jawaban-pertanyaan-'+ this.position +' :checked').length > 0;

		console.log(atLeastOneIsChecked);

		if (atLeastOneIsChecked == true) {
			this.position++;

			slidePertanyaan.cycle('next');

			prevButton.removeClass('disabled');

			if (this.position == this.totalSlide()) {
				nextButton.addClass('disabled');
			}

		}

		console.log('Total Slide : ' + this.totalSlide());

		console.log(this.position);
	},
	init: function(){
		var  nextButton = $('#next'),
			prevButton = $('#prev');

		prevButton.bind('click', function(event) {
			event.preventDefault();
			QuestionSlide.prev();
		});

		nextButton.bind('click', function(event) {
			event.preventDefault();
			QuestionSlide.next();
		});
	}
};

jQuery(document).ready(function($){

	QuestionSlide.init();

});