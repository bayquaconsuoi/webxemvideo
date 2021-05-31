<?php

function paginarion($number, $page, $addition) {
	if ($number > 1) {
		echo '<div class="pagination">';
		if ($page > 1) {
			echo '<a class="card-title" href="?page='.($page-1).''.$addition.'">Lùi trang</a>';
		}

		$avaiablePage = [1, $page-1, $page, $page+1, $number];
		$isFirst      = $isLast      = false;
		for ($i = 0; $i < $number; $i++) {
			if (!in_array($i+1, $avaiablePage)) {
				if (!$isFirst && $page > 3) {
					echo '<a class="card-title" href="?page='.($page-2).$addition.'">...</a>';
					$isFirst = true;
				}
				if (!$isLast && $i > $page) {
					echo '<a class="card-title" href="?page='.($page+2).$addition.'">...</a>';
					$isLast = true;
				}

				continue;
			}

			if ($page == ($i+1)) {
				echo '<a class="card-title active" href="#">'.($i+1).'</a>';
			} else {
				echo '<a class="card-title" href="?page='.($i+1).$addition.'">'.($i+1).'</a>';
			}
		}
		if ($page < ($number)) {
			echo '<a class="card-title" href="?page='.($page+1).$addition.'">Trang kế</a>';
		}
		echo '</div>';
	}
}


