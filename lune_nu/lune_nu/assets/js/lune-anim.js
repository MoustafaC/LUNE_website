(function() {

  var lune,
    luneImage,
    canvas;

  lune.render();

  function sprite(options) {
    var that = {},
      frameIndex = 0,
      tickCount = 0,
      ticksPerFrame = options.ticksPerFrame || 0,
      numberOfFrames = options.numberOfFrames || 1;

    that.context = options.context;
    that.width = options.width;
    that.height = options.height;
    that.image = options.image;

    that.update = function() {

      tickCount += 1;

      if (tickCount > ticksPerFrame) {

        tickCount = 0;

        // If the current frame index is in range
        if (frame < numberOfFrames - 1) {
          // Go to the next frame
          frameIndex += 1;
        }
      }
    };

    that.render = function() {

      // Clear the canvas
      context.clearRect(0, 0, that.width, that.height);

      // Draw the animation
      that.context.drawImage(
        that.image,
        frameIndex * that.width / numberOfFrames,
        0,
        that.width / numberOfFrames,
        that.height,
        0,
        0,
        that.width / numberOfFrames,
        that.height);
    };

    return that;

  }

  // Get canvas
  canvas = document.getElementById("luneAnimation");
  canvas.width = 256;
  canvas.height = 256;

  // Create sprite sheet
  luneImage = new Image();

  lune = sprite({
    context: canvas.getContext("2d"),
    width: 256 * 400,
    height: 256,
    image: luneImage,
    numberOfFrames: 400
  });

  luneImage.src = "imgs/luneSheet.png";

}());
