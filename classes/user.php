<?php ${"\x47\x4cO\x42A\x4c\x53"}["\x6d\x6e\x62sb\x6a"]="\x65m\x61il";${"\x47\x4c\x4f\x42\x41L\x53"}["yl\x6dy\x6e\x6b\x72\x6d\x61o\x77"]="\x72\x6f\x77";${"\x47LO\x42A\x4c\x53"}["\x73\x66\x78\x68\x67\x6d\x66\x6d"]="\x70\x61\x73\x73\x77\x6f\x72\x64";${"G\x4cO\x42ALS"}["\x6d\x75s\x62s\x6a\x68\x6dw"]="use\x72\x6e\x61me";${"\x47L\x4f\x42\x41\x4cS"}["\x6c\x6b\x63xwj\x70"]="s\x74\x6dt";${"\x47\x4cOB\x41\x4c\x53"}["ee\x7a\x66x\x66q\x64s\x61"]="d\x62";require_once("passw\x6frd.ph\x70");class User extends Password{private$_db;function __construct($db){parent::__construct();$this->_db=${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x65\x65\x7a\x66\x78fq\x64s\x61"]};}public function __sleep(){return array();}private function get_user_hash($username){try{$gieiabl="\x73\x74mt";$uijnmxn="\x75\x73\x65\x72\x6e\x61\x6d\x65";${$gieiabl}=$this->_db->prepare("SEL\x45C\x54\x20pa\x73sw\x6frd, u\x73er\x6eame,\x20m\x65\x6dbe\x72\x49D F\x52\x4fM\x20\x6d\x65mbe\x72s\x20\x57HER\x45 \x75\x73er\x6e\x61\x6d\x65 =\x20:\x75\x73\x65r\x6eam\x65\x20AND\x20a\x63t\x69v\x65\x3d\"\x59\x65s\"\x20");$stmt->execute(array("\x75se\x72\x6e\x61me"=>${$uijnmxn}));return$stmt->fetch();}catch(PDOException$e){echo"<\x70\x20cl\x61ss\x3d\x22bg-d\x61\x6eger\">".$e->getMessage()."</\x70>";}}private function get_email_hash($email){try{${"\x47\x4cOB\x41\x4cS"}["\x70c\x65y\x6c\x72y\x72\x62\x72"]="\x65mai\x6c";${${"\x47\x4cOB\x41\x4c\x53"}["\x6ckcx\x77\x6a\x70"]}=$this->_db->prepare("\x53E\x4cEC\x54\x20\x70\x61\x73\x73w\x6f\x72d,\x20us\x65rname, \x6de\x6d\x62\x65r\x49D,\x20email FROM\x20\x6d\x65\x6d\x62e\x72\x73 WH\x45R\x45 \x65m\x61il\x20=\x20:emai\x6c \x41\x4eD \x61ctiv\x65=\x22Y\x65s\x22 ");$stmt->execute(array("\x65ma\x69\x6c"=>${${"G\x4cO\x42A\x4c\x53"}["pc\x65y\x6c\x72\x79\x72\x62r"]}));return$stmt->fetch();}catch(PDOException$e){echo"\x3cp \x63l\x61\x73s=\x22\x62\x67-dan\x67\x65\x72\"\x3e".$e->getMessage()."\x3c/p>";}}public function isValidUsername($username){${"G\x4cOB\x41\x4c\x53"}["e\x6a\x75\x61e\x6a\x71\x67\x65"]="\x75se\x72\x6e\x61m\x65";if(strlen(${${"G\x4cOBA\x4cS"}["\x6d\x75\x73\x62\x73jhm\x77"]})<3)return false;$ktrkjdg="\x75ser\x6e\x61\x6d\x65";if(strlen(${$ktrkjdg})>17)return false;if(!ctype_alnum(${${"\x47\x4c\x4fBA\x4cS"}["\x65j\x75a\x65j\x71\x67\x65"]}))return false;return true;}public function login($username,$password){if(!$this->isValidUsername(${${"\x47\x4cO\x42\x41\x4c\x53"}["\x6du\x73\x62\x73\x6ahm\x77"]}))return false;if(strlen(${${"G\x4c\x4fB\x41\x4cS"}["\x73\x66\x78\x68gm\x66m"]})<3)return false;${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x61\x6f\x6cx\x79v\x6b"]="\x72\x6f\x77";$vfqkpkwp="\x70a\x73s\x77o\x72\x64";${${"G\x4cO\x42\x41\x4cS"}["y\x6c\x6dy\x6ekr\x6d\x61\x6f\x77"]}=$this->get_user_hash(${${"G\x4c\x4fB\x41LS"}["\x6du\x73\x62\x73\x6a\x68\x6d\x77"]});if($this->password_verify(${$vfqkpkwp},${${"\x47\x4c\x4f\x42AL\x53"}["\x61\x6f\x6c\x78\x79\x76\x6b"]}["p\x61\x73s\x77or\x64"])==1){$_SESSION["log\x67e\x64i\x6e"]=true;$_SESSION["\x75s\x65\x72na\x6d\x65"]=${${"\x47\x4c\x4fB\x41L\x53"}["\x79l\x6d\x79n\x6b\x72ma\x6f\x77"]}["use\x72\x6ea\x6de"];$_SESSION["me\x6dbe\x72I\x44"]=${${"G\x4cO\x42A\x4c\x53"}["\x79\x6cmynkr\x6d\x61\x6f\x77"]}["\x6de\x6d\x62\x65\x72I\x44"];return true;}}public function loginEmail($email,$password){${"\x47\x4c\x4f\x42\x41\x4c\x53"}["r\x76\x74\x62\x6f\x61bo\x78"]="\x65\x6d\x61il";$nteqyutuo="\x72\x6fw";if(!filter_var(${${"\x47\x4c\x4f\x42\x41\x4cS"}["r\x76t\x62\x6fab\x6f\x78"]},FILTER_VALIDATE_EMAIL))return false;if(strlen(${${"\x47L\x4fB\x41LS"}["\x73\x66\x78h\x67m\x66\x6d"]})<3)return false;${"\x47\x4c\x4fBA\x4cS"}["tu\x78\x6a\x71s\x77\x66\x6du"]="\x70\x61\x73s\x77or\x64";${${"\x47LO\x42\x41\x4c\x53"}["\x79\x6c\x6d\x79n\x6br\x6daow"]}=$this->get_email_hash(${${"\x47\x4cO\x42ALS"}["mn\x62\x73\x62\x6a"]});if($this->password_verify(${${"\x47\x4cO\x42AL\x53"}["\x74ux\x6a\x71s\x77\x66\x6d\x75"]},${$nteqyutuo}["pa\x73sw\x6f\x72d"])==1){${"\x47\x4cO\x42\x41LS"}["u\x6fq\x70qdpsd\x76\x66"]="ro\x77";$_SESSION["l\x6fgged\x69\x6e"]=true;$_SESSION["u\x73ern\x61\x6de"]=${${"G\x4c\x4fB\x41\x4c\x53"}["\x79\x6c\x6d\x79\x6e\x6b\x72\x6d\x61\x6f\x77"]}["us\x65rna\x6d\x65"];$_SESSION["m\x65mb\x65rI\x44"]=${${"\x47\x4c\x4f\x42\x41\x4cS"}["\x79\x6c\x6dy\x6e\x6br\x6daow"]}["\x6dem\x62\x65\x72I\x44"];$_SESSION["e\x6da\x69\x6c"]=${${"GL\x4f\x42AL\x53"}["\x75o\x71pqd\x70\x73\x64\x76f"]}["\x65\x6d\x61\x69\x6c"];return true;}}public function isEmailUser($email){$fftnbemho="row";${"\x47\x4cOBALS"}["rvu\x67\x67\x6c\x76"]="\x65\x6da\x69l";if(!filter_var(${${"\x47L\x4f\x42\x41LS"}["r\x76\x75\x67\x67\x6c\x76"]},FILTER_VALIDATE_EMAIL))return false;${"G\x4cO\x42\x41\x4c\x53"}["\x68\x6ce\x72a\x73\x71\x70g"]="r\x6fw";${${"GLO\x42\x41\x4cS"}["\x68\x6c\x65r\x61sq\x70\x67"]}=$this->get_email_hash(${${"\x47\x4cOBA\x4c\x53"}["\x6d\x6e\x62\x73b\x6a"]});if(isset(${$fftnbemho}["e\x6d\x61\x69\x6c"])){$grmhwsgafd="\x72\x6fw";if(${$grmhwsgafd}["\x65m\x61\x69\x6c"]==${${"\x47LO\x42\x41\x4c\x53"}["mn\x62sbj"]}){return true;}}return false;}public function setActiveEmail($email){$iklrxqn="\x65mai\x6c";if(!filter_var(${$iklrxqn},FILTER_VALIDATE_EMAIL))return false;$mubrrkxvdt="\x72ow";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["wcxs\x6f\x64\x77\x69\x66\x70q"]="\x72o\x77";${$mubrrkxvdt}=$this->get_email_hash(${${"\x47L\x4f\x42\x41\x4c\x53"}["\x6d\x6ebs\x62\x6a"]});$_SESSION["logg\x65\x64i\x6e"]=true;$_SESSION["us\x65\x72n\x61\x6de"]=${${"\x47\x4cO\x42A\x4c\x53"}["\x79\x6c\x6d\x79\x6ek\x72\x6d\x61\x6f\x77"]}["\x75\x73e\x72\x6e\x61\x6de"];$_SESSION["\x6dem\x62\x65rID"]=${${"\x47\x4c\x4fBA\x4c\x53"}["\x77\x63\x78\x73\x6f\x64\x77\x69\x66pq"]}["\x6d\x65\x6d\x62\x65r\x49D"];$_SESSION["e\x6d\x61il"]=${${"\x47L\x4f\x42\x41\x4cS"}["\x79\x6cm\x79\x6ek\x72\x6d\x61o\x77"]}["e\x6d\x61i\x6c"];$_SESSION["\x76\x69\x65\x77o\x72\x64e\x72"]=true;return true;}}
?>