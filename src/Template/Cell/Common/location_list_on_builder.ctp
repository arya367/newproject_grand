<script><?  $conc="";?><? if(count($data)!=0){ foreach($data as $key=>$value) { $conc.='"'.$value['id'].'":"'.$value['name'].'",' ;}}?>var locations={<?=$conc?>};</script>