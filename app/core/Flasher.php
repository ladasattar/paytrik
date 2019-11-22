<?php

class Flasher {
	public static function setFlash($msg, $icon, $color)
	{
		$_SESSION['flash'] = [
			'msg' => $msg,
			'icon' => $icon,
			'color' => $color
		];
	}

	public static function flash()
	{
		if (isset($_SESSION['flash'])) {
			echo '<section class="alert-wrap p-b-30">
					<div class="container">
						<!-- ALERT-->
						<div class="alert alert-dismissible fade show au-alert au-alert--70per" role="alert">
							<i class="zmdi zmdi-' . $_SESSION['flash']['icon'] . '" style="color: ' . $_SESSION['flash']['color'] .'"></i>
							<span class="content">' . $_SESSION['flash']['msg'] . '</span>
							<button class="close" type="button" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">
									<i class="zmdi zmdi-close-circle"></i>
								</span>
							</button>
						</div>
						<!-- END ALERT-->
					</div>
				</section>';
			unset($_SESSION['flash']);
		}
	}
}