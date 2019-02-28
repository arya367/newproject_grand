<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Paging cell
 */
class PagingCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($pagenumber,$total,$table,$link2)
    {
		
 if($link2!='null') { $link= ROOT_PATH.$table.'/'.$link2;  $per_page = 6;} else { $link=ROOT_PATH.$table; $per_page = 6;}
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
			$msg .= "<ul class='pagination justify-content-center'>";
			/*if ($first_btn && $cur_page > 1) {
			$msg .= "<li p='1'><a href='".$link."'>First</a></li>";
			} else if ($first_btn) {
			$msg .= "<li p='1' class='disabled'><a>First</a></li>";
			}*/
			
			if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			if($pre==1){$msg .= "<li class='page-item disabled' p='$pre'><a class='page-link' href='".$link."/'>Previous</a></li>"; }
			else { $msg .= "<li class='page-item disabled' p='$pre'><a class='page-link' tabindex='-1' href='".$link."/?page=$pre'>Previous</a></li>";}
			} else if ($previous_btn) {
			$msg .= "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";
			}
			for ($i = $start_loop; $i <= $end_loop; $i++) {
			
			if ($cur_page == $i) {
			if ($cur_page == 1){$msg .= "<li p='$i' class='page-item active'><a class='page-link' href='".$link."/'>{$i}</a></li>";}
			else { $msg .= "<li p='$i' class='page-item'><a class='page-link' href='".$link."/?page=$i'>{$i}</a></li>";}}
			else { $msg .= "<li p='$i' class='page-item'><a class='page-link' href='".$link."/?page=$i'>{$i}</a></li>";}
			}
			
			if ($next_btn && $cur_page < $no_of_paginations) {
			$nex = $cur_page + 1;
			$msg .= "<li class='page-item' p='$nex'><a class='page-link' href='".$link."/?page=$nex'>Next</a></li>";
			} else if ($next_btn) {
			$msg .= "<li class='disabled page-item'><a class='page-link'>Next</a></li>";
			}
			
			/*if ($last_btn && $cur_page < $no_of_paginations) {
			$msg .= "<li p='$no_of_paginations'><a href='".$link."/?page=$no_of_paginations'>Last</a></li>";
			} else if ($last_btn) {
			$msg .= "<li p='$no_of_paginations' class='disabled'><a>Last</a></li>";
			}*/
			
			$msg = $msg . "</ul>" . $goto . $total_string;
			$this->set('paging',$msg); 
			
 
 
    }
	
	public function builderpaging($pagenumber,$total,$table,$link2)
    {
		
 if($link2!='null') { $link= ROOT_PATH.$table.'/'.$link2;  $per_page = 6;} else { $link=ROOT_PATH.$table; $per_page = 6;}
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
			$this->set('paging',$msg); 
			
 
 
    }
	
	public function ajaxpaging($pagenumber,$total) {
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
			$this->set('paging',$msg); 
 
 
 
 
 }
 
 
    public function createSearchPagination($pagenumber,$total,$table,$params) {
  $link=ROOT_PATH.$table; $per_page = 6;
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
			$this->set('paging',$msg); 
 
 }
}
