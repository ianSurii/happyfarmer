<style>
$gap-xs: 6px;
$gap-sm: 12px;
$gap: 18px;
$gap-md: 24px;
$gap-lg: 36px;

$screen-xs: 480px;
$screen-sm: 768px;
$screen-sm-min: $screen-sm - 1px;
$screen-md: 991px;
$screen-lg: 1200px;

$text-color: #222;

$step01: #010C4E;
$step02: #002D88;
$step03: #017AA9;
$step04: #03C2B2;
$step05: #05E8B0;

$progress-track: #eee;
$progress-fill: #0074d9;

// I put some stuff you won't care about in a style tag just to get it out of your way. Isn't that nice?

@mixin progress-step($color) {
  // for some reason, these really dont want to be comma separated.
  .progress[value]::-moz-progress-bar {
    background-color: $color;
    
  }
  .progress[value]::-webkit-progress-value {
    background-color: $color;
  }
  .progress[value="100"] + .progress-circle {
    background-color: $color;
  }
}

.progress {
  display: block; 
  width: 100%; 
  height: $gap-sm;
  position: relative;
  z-index: 5;
  padding-right: 8px;
  padding-top:2px;
  // this is horrendous, but for some reason Mozilla has a couple extra pixels.
  @media all and (min--moz-device-pixel-ratio:0) and (min-resolution: 3e1dpcm) {
    height:10px;
  }
  &[value] {
    background-color:transparent;
    border: 0; 
    appearance: none; 
    border-radius: 0;
    // These dont work when they are comma separated. No clue why..
    &::-ms-fill {
      background-color: $progress-fill; 
      border: 0;
    }
    &::-moz-progress-bar {
      background-color: $progress-fill; 
      margin-right:8px;
    }
    &::-webkit-progress-inner-element {
      background-color: $progress-track;
    }
    &::-webkit-progress-value {
      background-color: $progress-fill; 
    }
    &::-webkit-progress-bar {
      background-color: $progress-track; 
    }
  }
}

.progress-circle {
  width: $gap-md;
  height: $gap-md;
  position: absolute;
  right: 3px;
  top: -$gap-xs + 1px;
  z-index: 5;
  border-radius: 50%;
  &:before {
    content: "";
    width: $gap-xs;
    height: $gap-xs;
    background: white;
    border-radius: 50%;
    display: block;
    transform: translate(-50%, -50%);
    position: absolute;
    left: 50%;
    top: 50%;
  }
}

.progress-group {
  margin-top: $gap-lg;
  @media (max-width:$screen-md) {
    margin-left: -$gap;
    margin-right: -$gap;
    flex-basis: 100%;
    padding: $gap;
  }
  @media (max-width:$screen-sm) {
    padding: $gap $gap 0;
    margin-bottom: $gap-sm;
  }
  .title {
    margin-bottom: $gap-sm + $gap-xs;
  }
  .wrapper {
    background: white;
    border: 1px solid #eee;
    border-radius: $gap-sm;
    height: $gap-sm + 2px;
    display: flex;
    filter: drop-shadow(0 0 1px rgba(black,0.3));
  }
  .step {
    width: 20%;
    position: relative;
    &:after {
      content: "";
      height: $gap-md + $gap-xs;
      width: $gap-md + $gap-xs;
      background: white;
      border-radius: 50%;
      display: block;
      position: absolute;
      right: 0;
      top: 50%;
      transform: translateY(-50%);
    }
    &:first-of-type {
      .progress {
        padding-left:4px;
        &[value]::-moz-progress-bar {
          border-radius: 5px 0 0 5px;
        }
        &[value]::-webkit-progress-value {
          border-radius: 5px 0 0 5px;
        }
      }
    }
    &:not(:first-of-type) {
      .progress {
        &[value]::-moz-progress-bar {
          border-radius: 0;
        }
        &[value]::-webkit-progress-value {
          border-radius: 0;
        }
      }
    }
    .progress[value] {
      + .progress-circle {
        background: $progress-track;
      }
    }
    &.step01 {
      @include progress-step($step01);
    }
    &.step02 {
      @include progress-step($step02);
    }
    &.step03 {
      @include progress-step($step03);
    }
    &.step04 {
      @include progress-step($step04);
    }
    &.step05 {
      @include progress-step($step05);
    }
  }  
}

.progress-labels {
  display: flex;
  justify-content: space-between;
  .label {
    text-align: center;
    text-transform: uppercase;
    margin: $gap-sm 0;
    width: 20%;
    font-size: 11px;
    padding-right: 24px;
    font-weight: 600;
    opacity: 0.7;
  }
}
.page-title {
  letter-spacing:-0.05rem;
  
}
</style>
<div class="container">
  <h1 class="page-title">Multi-step Progress Bar(s)</h1>
  <div class="progress-group">
    <div class="wrapper">
      <div class="step step01 complete">
        <progress class="progress" value="100" max="100" aria-describedby="Step 01"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step02 complete">
        <progress class="progress" value="100" max="100" aria-describedby="Step 02"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step03 complete">
        <progress class="progress" value="100" max="100" aria-describedby="Step 03"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step04 complete">
        <progress class="progress" value="100" max="100" aria-describedby="Step 04"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step05">
        <progress class="progress" value="20" max="100" aria-describedby="Step 05"></progress>
        <div class="progress-circle"></div>
      </div>
    </div>
    <div class="progress-labels">
      <div class="label">Step 01</div>
      <div class="label">Step 02</div>
      <div class="label">Step 03</div>
      <div class="label">Step 04</div>
      <div class="label">Step 05</div>
    </div>
  </div>
</div>
