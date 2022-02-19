<style type="text/css">
	.teste {
    width: 200px;
    height: 200px;

    -webkit-animation-name: example; /* Chrome, Safari, Opera */
    -webkit-animation-duration: 1s; /* Chrome, Safari, Opera */
    animation-name: example;
    animation-duration: 1s;
}

/* Chrome, Safari, Opera */
@-webkit-keyframes example {
    0%   {opacity:0}
    10%   {opacity:0.1}
    20%   {opacity:0.2}
    30%  {opacity:0.3}
    40%   {opacity:0.4}
    50%  {opacity:0.5}
    60%   {opacity:0.6}
    70%  {opacity:0.7}
    80%   {opacity:0.8}
    90%   {opacity:0.9}
    100% {opacity:1}
}

/* Standard syntax */
@keyframes example {
     0%   {opacity:0}
    10%   {opacity:0.1}
    20%   {opacity:0.2}
    30%  {opacity:0.3}
    40%   {opacity:0.4}
    50%  {opacity:0.5}
    60%   {opacity:0.6}
    70%  {opacity:0.7}
    80%   {opacity:0.8}
    90%   {opacity:0.9}
    100% {opacity:1}
}
	</style>
    <?php if (isset($_GET['go'])): ?>
        <center><div class="teste"><img src="img/salvo.png" alt="" style="width:150px; margin-top:100%;"></div></center>
    <?php endif ?>
    <?php if (!isset($_GET['go'])): ?>
        <center><div class="teste"><img src="../img/salvo.png" alt="" style="width:150px; margin-top:100%;"></div></center>
    <?php endif ?>
