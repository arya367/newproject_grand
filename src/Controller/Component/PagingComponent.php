<?php
## function to create thumbnail of size 200,200 of jpeg/png 
class PagingComponent extends Component  {

function getPaging () {?> <div class="pagination"><ul><li onClick="pagingMedia(1)" class="inactive">First</li><li class="inactive">Previous</li><li onClick="pagingMedia(1)" style="color:#fff;background-color:#000000;" class="active">1</li><li onClick="pagingMedia(2)" class="active">2</li><li onClick="pagingMedia(3)" class="active">3</li><li onClick="pagingMedia(4)" class="active">4</li><li onClick="pagingMedia(5)" class="active">5</li><li onClick="pagingMedia(6)" class="active">6</li><li onClick="pagingMedia(7)" class="active">7</li><li onClick="pagingMedia(2)" class="active">Next</li><li onClick="pagingMedia(48)" class="active">Last</li></ul></div><? }






$msg .= "<div class='pagination'><ul>";
			
			
			if ($first_btn && $cur_page > 1) {
			$msg .= "<a href='".$link."/?page=1'><li p='1' class='active'>First</li></a>";
			} else if ($first_btn) {
			$msg .= "<li p='1' class='inactive'>First</li>";
			}
			
			
			if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			$msg .= "<a href='".$link."/?page=$pre'><li p='$pre'  class='active'>Previous</li></a>";
			} else if ($previous_btn) {
			$msg .= "<li class='inactive'>Previous</li>";
			}
			for ($i = $start_loop; $i <= $end_loop; $i++) {
			
			if ($cur_page == $i)
			$msg .= "<a href='".$link."/?page=$i'><li p='$i' style='color:#fff;background-color:#006699;' class='active'>{$i}</li></a>";
			else
			$msg .= "<a href='".$link."/?page=$i'><li p='$i' class='active'>{$i}</li></a>";
			}
			
			
			
			if ($next_btn && $cur_page < $no_of_paginations) {
			$nex = $cur_page + 1;
			$msg .= "<a href='".$link."/?page=$nex'><li p='$nex' class='active'>Next</li></a>";
			} else if ($next_btn) {
			$msg .= "<li class='inactive'>Next</li>";
			}
			
			
			if ($last_btn && $cur_page < $no_of_paginations) {
			$msg .= "<a href='".$link."/?page=$no_of_paginations'><li p='$no_of_paginations' class='active'>Last</li></a>";
			} else if ($last_btn) {
			$msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
			}
			
			$msg = $msg . "</ul>" . $goto . $total_string . "</div>"; 
			echo $msg;


}
?>