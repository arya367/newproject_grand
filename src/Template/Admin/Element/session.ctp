<?   if (!$this->request->session()->check('USERNAME')) { echo " checking your data please wait...  <script>window.location.href='".SITE_PATH."admin';</script>"; exit; }?>