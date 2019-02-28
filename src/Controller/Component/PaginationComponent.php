<?php
namespace App\Controller\Component;
use Cake\Controller\Component;

class PaginationComponent extends Component  {

public function createBuilderPagination($pagenumber,$total,$table,$link2) {
 if($link2!='null') { $link= ROOT_PATH.$table.'/'.$link2;  $per_page = 6;} else { $link=ROOT_PATH.$table; $per_page = 10;}
 if($pagenumber!=0 and $pagenumber!=-1){$page = $pagenumber;}
 else{ $page = 1; }
			
			$cur_page = $page;
			$page -= 1;
			
			$previous_btn = true;
			$next_btn = true;
			$first_btn = true;
			$last_btn = true;
			$start = $page * $per_page;
			$msg='';
			$goto ='';
			$total_string ='';
			
			$count = $total;
			$no_of_paginations = ceil($count / $per_page);
			
			if ($cur_page >= 7) {
			$start_loop = $cur_page - 3;
			if ($no_of_paginations > $cur_page + 3)
			$end_loop = $cur_page + 3;
			else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
			$start_loop = $no_of_paginations - 6;
			$end_loop = $no_of_paginations;
			} else {
			$end_loop = $no_of_paginations;
			}
			} else {
			$start_loop = 1;
			if ($no_of_paginations > 7)
			$end_loop = 7;
			else
			$end_loop = $no_of_paginations;
			}
			/* ----------------------------------------------------------------------------------------------------------- */
			$msg .= "<ul class='pagination'>";
			if ($first_btn && $cur_page > 1) {
			$msg .= "<li p='1'><a href='".$link."'>First</a></li>";
			} else if ($first_btn) {
			$msg .= "<li p='1' class='disabled'><a>First</a></li>";
			}
			
			if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			if($pre==1){$msg .= "<li p='$pre'><a href='".$link."/'>Previous</a></li>"; }
			else { $msg .= "<li p='$pre'><a href='".$link."/?page=$pre'>Previous</a></li>";}
			} else if ($previous_btn) {
			$msg .= "<li class='disabled'><a>Previous</a></li>";
			}
			for ($i = $start_loop; $i <= $end_loop; $i++) {
			
			if ($cur_page == $i) {
			if ($cur_page == 1){$msg .= "<li p='$i' class='active'><a href='".$link."/'>{$i}</a></li>";}
			else { $msg .= "<li p='$i' class='active'><a href='".$link."/?page=$i'>{$i}</a></li>";}}
			else { $msg .= "<li p='$i'><a href='".$link."/?page=$i'>{$i}</a></li>";}
			}
			
			if ($next_btn && $cur_page < $no_of_paginations) {
			$nex = $cur_page + 1;
			$msg .= "<li p='$nex'><a href='".$link."/?page=$nex'>Next</a></li>";
			} else if ($next_btn) {
			$msg .= "<li class='disabled'><a>Next</a></li>";
			}
			
			if ($last_btn && $cur_page < $no_of_paginations) {
			$msg .= "<li p='$no_of_paginations'><a href='".$link."/?page=$no_of_paginations'>Last</a></li>";
			} else if ($last_btn) {
			$msg .= "<li p='$no_of_paginations' class='disabled'><a>Last</a></li>";
			}
			
			$msg = $msg . "</ul>" . $goto . $total_string; 
			echo $msg;
 
 }
 
public function createSearchPagination($pagenumber,$total,$table,$params) {
  $link=ROOT_PATH.$table; $per_page = 10;
 if($pagenumber!=0 and $pagenumber!=-1){$page = $pagenumber;}
 else{ $page = 1; }
			
			$cur_page = $page;
			$page -= 1;
			
			$previous_btn = true;
			$next_btn = true;
			$first_btn = true;
			$last_btn = true;
			$start = $page * $per_page;
			$msg='';
			$goto ='';
			$total_string ='';
			
			$count = $total;
			$no_of_paginations = ceil($count / $per_page);
			
			if ($cur_page >= 7) {
			$start_loop = $cur_page - 3;
			if ($no_of_paginations > $cur_page + 3)
			$end_loop = $cur_page + 3;
			else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
			$start_loop = $no_of_paginations - 6;
			$end_loop = $no_of_paginations;
			} else {
			$end_loop = $no_of_paginations;
			}
			} else {
			$start_loop = 1;
			if ($no_of_paginations > 7)
			$end_loop = 7;
			else
			$end_loop = $no_of_paginations;
			}
			/* ----------------------------------------------------------------------------------------------------------- */
			$msg .= "<ul class='pagination'>";
			if ($first_btn && $cur_page > 1) {
			$msg .= "<li p='1'><a href='".$link."?$params'>First</a></li>";
			} else if ($first_btn) {
			$msg .= "<li p='1' class='disabled'><a>First</a></li>";
			}
			
			if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			if($pre==1){$msg .= "<li p='$pre'><a href='".$link."/?page=$pre&$params'>Previous</a></li>"; }
			else { $msg .= "<li p='$pre'><a href='".$link."/?page=$pre&$params'>Previous</a></li>";}
			} else if ($previous_btn) {
			$msg .= "<li class='disabled'><a>Previous</a></li>";
			}
			for ($i = $start_loop; $i <= $end_loop; $i++) {
			
			if ($cur_page == $i) {
			if ($cur_page == 1){$msg .= "<li p='$i' class='active'><a href='".$link."/'>{$i}</a></li>";}
			else { $msg .= "<li p='$i' class='active'><a href='".$link."/?page=$i&$params'>{$i}</a></li>";}}
			else { $msg .= "<li p='$i'><a href='".$link."/?page=$i&$params'>{$i}</a></li>";}
			}
			
			if ($next_btn && $cur_page < $no_of_paginations) {
			$nex = $cur_page + 1;
			$msg .= "<li p='$nex'><a href='".$link."/?page=$nex&$params'>Next</a></li>";
			} else if ($next_btn) {
			$msg .= "<li class='disabled'><a>Next</a></li>";
			}
			
			if ($last_btn && $cur_page < $no_of_paginations) {
			$msg .= "<li p='$no_of_paginations'><a href='".$link."/?page=$no_of_paginations&$params'>Last</a></li>";
			} else if ($last_btn) {
			$msg .= "<li p='$no_of_paginations' class='disabled'><a>Last</a></li>";
			}
			
			$msg = $msg . "</ul>" . $goto . $total_string; 
			echo $msg;
 
 }

public function createPagination($pagenumber,$total,$table,$link2) {
 if($link2!='null') { $link= ROOT_PATH.$table.'/'.$link2; } else { $link=ROOT_PATH.$table;}
 if($pagenumber!=0 and $pagenumber!=-1){$page = $pagenumber;}
 else{ $page = 1; }
			
			$cur_page = $page;
			$page -= 1;
			$per_page = 6;
			$previous_btn = true;
			$next_btn = true;
			$first_btn = true;
			$last_btn = true;
			$start = $page * $per_page;
			$msg='';
			$goto ='';
			$total_string ='';
			
			$count = $total;
			$no_of_paginations = ceil($count / $per_page);
			
			if ($cur_page >= 7) {
			$start_loop = $cur_page - 3;
			if ($no_of_paginations > $cur_page + 3)
			$end_loop = $cur_page + 3;
			else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
			$start_loop = $no_of_paginations - 6;
			$end_loop = $no_of_paginations;
			} else {
			$end_loop = $no_of_paginations;
			}
			} else {
			$start_loop = 1;
			if ($no_of_paginations > 7)
			$end_loop = 7;
			else
			$end_loop = $no_of_paginations;
			}
			/* ----------------------------------------------------------------------------------------------------------- */
			$msg .= "<ul class='pagination'>";
			
			
			if ($first_btn && $cur_page > 1) {
			$msg .= "<li p='1'><a href='".$link."'>First</a></li>";
			} else if ($first_btn) {
			$msg .= "<li p='1' class='disabled'><a>First</a></li>";
			}
			
			
			if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			if($pre==1){$msg .= "<li p='$pre'><a href='".$link."/'>Previous</a></li>"; }
			else { $msg .= "<li p='$pre'><a href='".$link."/?page=$pre'>Previous</a></li>";}
			} else if ($previous_btn) {
			$msg .= "<li class='disabled'><a>Previous</a></li>";
			}
			for ($i = $start_loop; $i <= $end_loop; $i++) {
			
			
			if ($cur_page == $i) {
			if ($cur_page == 1){$msg .= "<li p='$i' class='active'><a href='".$link."/'>{$i}</a></li>";}
			else { $msg .= "<li p='$i' class='active'><a href='".$link."/?page=$i'>{$i}</a></li>";}}
			else { $msg .= "<li p='$i'><a href='".$link."/?page=$i'>{$i}</a></li>";}
			}
			
			
			
			if ($next_btn && $cur_page < $no_of_paginations) {
			$nex = $cur_page + 1;
			$msg .= "<li p='$nex'><a href='".$link."/?page=$nex'>Next</a></li>";
			} else if ($next_btn) {
			$msg .= "<li class='disabled'><a>Next</a></li>";
			}
			
			
			if ($last_btn && $cur_page < $no_of_paginations) {
			$msg .= "<li p='$no_of_paginations'><a href='".$link."/?page=$no_of_paginations'>Last</a></li>";
			} else if ($last_btn) {
			$msg .= "<li p='$no_of_paginations' class='disabled'><a>Last</a></li>";
			}
			
			$msg = $msg . "</ul>" . $goto . $total_string; 
			echo $msg;
 
 
 
 
 }
 
public function createBlogPagination($pagenumber,$total,$table) {
 $link= ROOT_PATH.$table;
 if($pagenumber!=0 and $pagenumber!=-1){$page = $pagenumber;}
 else{ $page = 1; }
			
			$cur_page = $page;
			$page -= 1;
			$per_page = 6;
			$previous_btn = true;
			$next_btn = true;
			$first_btn = true;
			$last_btn = true;
			$start = $page * $per_page;
			$msg='';
			$goto ='';
			$total_string ='';
			
			
			
			$count = $total;
			$no_of_paginations = ceil($count / $per_page);
			
			
			
			if ($cur_page >= 7) {
			$start_loop = $cur_page - 3;
			if ($no_of_paginations > $cur_page + 3)
			$end_loop = $cur_page + 3;
			else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
			$start_loop = $no_of_paginations - 6;
			$end_loop = $no_of_paginations;
			} else {
			$end_loop = $no_of_paginations;
			}
			} else {
			$start_loop = 1;
			if ($no_of_paginations > 7)
			$end_loop = 7;
			else
			$end_loop = $no_of_paginations;
			}
			/* ----------------------------------------------------------------------------------------------------------- */
			$msg .= "<div class='pagination'><ul>";
			
			
			if ($first_btn && $cur_page > 1) {
			$msg .= "<a href='".$link."'><li p='1' class='active'>First</li></a>";
			} else if ($first_btn) {
			$msg .= "<li p='1' class='inactive'>First</li>";
			}
			
			
			if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			if($pre==1){$msg .= "<a href='".$link."/'><li p='$pre'  class='active'>Previous</li></a>"; }
			else { $msg .= "<a href='".$link."/?page=$pre'><li p='$pre'  class='active'>Previous</li></a>";}
			} else if ($previous_btn) {
			$msg .= "<li class='inactive'>Previous</li>";
			}
			for ($i = $start_loop; $i <= $end_loop; $i++) {
			
			
			if ($cur_page == $i) {
			if ($cur_page == 1){$msg .= "<a href='".$link."/'><li p='$i' style='color:#fff;background-color:#5f2941;' class='active'>{$i}</li></a>";}
			else { $msg .= "<a href='".$link."/?page=$i'><li p='$i' style='color:#fff;background-color:#5f2941;' class='active'>{$i}</li></a>";}}
			else { $msg .= "<a href='".$link."/?page=$i'><li p='$i' class='active'>{$i}</li></a>";}
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
 
public function ajaxPagination($pagenumber,$total) {
 $link= '';
 if($pagenumber!=0 and $pagenumber!=-1){$page = $pagenumber;}
 else{ $page = 1; }
			
			$cur_page = $page;
			$page -= 1;
			$per_page = 6;
			$previous_btn = true;
			$next_btn = true;
			$first_btn = true;
			$last_btn = true;
			$start = $page * $per_page;
			$msg='';
			$goto ='';
			$total_string ='';
			
			
			
			$count = $total;
			$no_of_paginations = ceil($count / $per_page);
			
			
			
			if ($cur_page >= 7) {
			$start_loop = $cur_page - 3;
			if ($no_of_paginations > $cur_page + 3)
			$end_loop = $cur_page + 3;
			else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
			$start_loop = $no_of_paginations - 6;
			$end_loop = $no_of_paginations;
			} else {
			$end_loop = $no_of_paginations;
			}
			} else {
			$start_loop = 1;
			if ($no_of_paginations > 7)
			$end_loop = 7;
			else
			$end_loop = $no_of_paginations;
			}
			/* ----------------------------------------------------------------------------------------------------------- */
			$msg .= "<ul class='pagination'>";
			
			
			if ($first_btn && $cur_page > 1) {
			$msg .= "<li p='1'><a>First</a></li>";
			} else if ($first_btn) {
			$msg .= "<li p='1' class='disabled'><a>First</a></li>";
			}
			
			
			if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			if($pre==1){$msg .= "<li p='$pre'><a>Previous</a></li>"; }
			else { $msg .= "<li p='$pre'><a>Previous</li></a>";}
			} else if ($previous_btn) {
			$msg .= "<li class='disabled'><a>Previous</a></li>";
			}
			for ($i = $start_loop; $i <= $end_loop; $i++) {
			
			
			if ($cur_page == $i) {
			if ($cur_page == 1){$msg .= "<li p='$i' class='active'><a>{$i}</a></li>";}
			else { $msg .= "<li p='$i' class='active'><a>{$i}</a></li>";}}
			else { $msg .= "<li p='$i'><a>{$i}</a></li>";}
			}
			
			
			
			if ($next_btn && $cur_page < $no_of_paginations) {
			$nex = $cur_page + 1;
			$msg .= "<li p='$nex'><a>Next</a></li>";
			} else if ($next_btn) {
			$msg .= "<li class='disabled'><a>Next</a></li>";
			}
			
			
			if ($last_btn && $cur_page < $no_of_paginations) {
			$msg .= "<li p='$no_of_paginations'><a>Last</a></li>";
			} else if ($last_btn) {
			$msg .= "<li p='$no_of_paginations' class='disabled'><a>Last</a></li>";
			}
			
			$msg = $msg . "</ul>" . $goto . $total_string; 
			echo $msg;
 
 
 
 
 }
 
public function is_serialized($value, &$result = null)
{
	
	if (!is_string($value))
	{
		return false;
	}

	
	if ($value === 'b:0;')
	{
		$result = false;
		return true;
	}

	$length	= strlen($value);
	$end	= '';

	switch ($value[0])
	{
		case 's':
			if ($value[$length - 2] !== '"')
			{
				return false;
			}
		case 'b':
		case 'i':
		case 'd':
			
			$end .= ';';
		case 'a':
		case 'O':
			$end .= '}';

			if ($value[1] !== ':')
			{
				return false;
			}

			switch ($value[2])
			{
				case 0:
				case 1:
				case 2:
				case 3:
				case 4:
				case 5:
				case 6:
				case 7:
				case 8:
				case 9:
				break;

				default:
					return false;
			}
		case 'N':
			$end .= ';';

			if ($value[$length - 1] !== $end[0])
			{
				return false;
			}
		break;

		default:
			return false;
	}

}

}

?>