function showVideoModal(videoTitle) {
    $('#videoModalLabel').text(videoTitle);
    $('#videoFrame').attr('src', 'https://www.youtube.com/embed/dummy-video-id'); // Replace with actual video source
    $('#videoModal').modal('show');
}

// Clear video when modal is closed
$('#videoModal').on('hidden.bs.modal', function () {
    $('#videoFrame').attr('src', '');
});
