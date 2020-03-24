class VideoPlayer{
	constructor(){
		this.videos = document.getElementsByClassName('video');
		this.initVideosControl();
	}

	initVideosControl(){
		for(let video of this.videos){
			this.initStartVideoParams(video);

			$(video).on('play', function(){
				let playBtn = $('.video-play-btn[data-video-id="' + $(this).attr('id') + '"]');
				playBtn.removeClass('play');
				playBtn.addClass('pause');
			});

			$(video).on('pause', function(){
				let playBtn = $('.video-play-btn[data-video-id="' + $(this).attr('id') + '"]');
				playBtn.removeClass('pause');
				playBtn.addClass('play');
			});

			$(video).on('volumechange', function(){
				let muteBtn = $('.video-mute-btn[data-video-id="' + $(this).attr('id') + '"]');
				muteBtn.toggleClass('mute');
				muteBtn.toggleClass('unmute');
			});
		}

		$('.video-play-btn').on('click', function(){
			let videoID = $(this).attr('data-video-id');
			let video = document.getElementById(videoID);
			if(!$(this).hasClass('play')){
				video.pause();
			}else{
				video.play();
			}
		});

		$('.video-mute-btn').on('click', function(){
			let videoID = $(this).attr('data-video-id');
			let video = document.getElementById(videoID);
			if($(this).hasClass('mute')){
				video.volume = 1;
			}else{
				video.volume = 0;
			}
		});
	}

	initStartVideoParams(video){
		video.volume = 0;
		video.muted = false;
		video.controls = false;
		video.loop = true;
		$(video).css({'object-fit': 'cover'});
		video.play();
	}
}