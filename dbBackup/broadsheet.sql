

CREATE TABLE `broadsheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `students_id` int(11) DEFAULT NULL,
  `name` tinytext DEFAULT NULL,
  `class` varchar(5) DEFAULT NULL,
  `sessionterm` varchar(11) DEFAULT NULL,
  `ar_cat` int(11) NOT NULL DEFAULT 0,
  `ar_project` int(11) NOT NULL DEFAULT 0,
  `ar_exam` int(11) NOT NULL DEFAULT 0,
  `ar_total` int(11) GENERATED ALWAYS AS (`ar_cat` + `ar_project` + `ar_exam`) VIRTUAL,
  `bs1_cat` int(11) NOT NULL DEFAULT 0,
  `bs1_project` int(11) NOT NULL DEFAULT 0,
  `bs1_exam` int(11) NOT NULL DEFAULT 0,
  `bs1_total` int(11) GENERATED ALWAYS AS (`bs1_cat` + `bs1_project` + `bs1_exam`) VIRTUAL,
  `bs2_cat` int(11) NOT NULL DEFAULT 0,
  `bs2_project` int(11) NOT NULL DEFAULT 0,
  `bs2_exam` int(11) NOT NULL DEFAULT 0,
  `bs2_total` int(11) GENERATED ALWAYS AS (`bs2_cat` + `bs2_project` + `bs2_exam`) VIRTUAL,
  `bu_cat` int(11) NOT NULL DEFAULT 0,
  `bu_project` int(11) NOT NULL DEFAULT 0,
  `bu_exam` int(11) NOT NULL DEFAULT 0,
  `bu_total` int(11) GENERATED ALWAYS AS (`bu_cat` + `bu_project` + `bu_exam`) VIRTUAL,
  `ca_cat` int(11) NOT NULL DEFAULT 0,
  `ca_project` int(11) NOT NULL DEFAULT 0,
  `ca_exam` int(11) NOT NULL DEFAULT 0,
  `ca_total` int(11) GENERATED ALWAYS AS (`ca_cat` + `ca_project` + `ca_exam`) VIRTUAL,
  `en_cat` int(11) NOT NULL DEFAULT 0,
  `en_project` int(11) NOT NULL DEFAULT 0,
  `en_exam` int(11) NOT NULL DEFAULT 0,
  `en_total` int(11) GENERATED ALWAYS AS (`en_cat` + `en_project` + `en_exam`) VIRTUAL,
  `ir_cat` int(11) NOT NULL DEFAULT 0,
  `ir_project` int(11) NOT NULL DEFAULT 0,
  `ir_exam` int(11) NOT NULL DEFAULT 0,
  `ir_total` int(11) GENERATED ALWAYS AS (`ir_cat` + `ir_project` + `ir_exam`) VIRTUAL,
  `mt_cat` int(11) NOT NULL DEFAULT 0,
  `mt_project` int(11) NOT NULL DEFAULT 0,
  `mt_exam` int(11) NOT NULL DEFAULT 0,
  `mt_total` int(11) GENERATED ALWAYS AS (`mt_cat` + `mt_project` + `mt_exam`) VIRTUAL,
  `qr_cat` int(11) NOT NULL DEFAULT 0,
  `qr_project` int(11) NOT NULL DEFAULT 0,
  `qr_exam` int(11) NOT NULL DEFAULT 0,
  `qr_total` int(11) GENERATED ALWAYS AS (`qr_cat` + `qr_project` + `qr_exam`) VIRTUAL,
  `nv_cat` int(11) NOT NULL DEFAULT 0,
  `nv_project` int(11) NOT NULL DEFAULT 0,
  `nv_exam` int(11) NOT NULL DEFAULT 0,
  `nv_total` int(11) GENERATED ALWAYS AS (`nv_cat` + `nv_project` + `nv_exam`) VIRTUAL,
  `pv_cat` int(11) NOT NULL DEFAULT 0,
  `pv_project` int(11) NOT NULL DEFAULT 0,
  `pv_exam` int(11) NOT NULL DEFAULT 0,
  `pv_total` int(11) GENERATED ALWAYS AS (`pv_cat` + `pv_project` + `pv_exam`) VIRTUAL,
  `yo_cat` int(11) NOT NULL DEFAULT 0,
  `yo_project` int(11) NOT NULL DEFAULT 0,
  `yo_exam` int(11) NOT NULL DEFAULT 0,
  `yo_total` int(11) GENERATED ALWAYS AS (`yo_cat` + `yo_project` + `yo_exam`) VIRTUAL,
  `cat_total` int(11) GENERATED ALWAYS AS (`ar_cat` + `bs1_cat` + `bs2_cat` + `bu_cat` + `ca_cat` + `nv_cat` + `pv_cat` + `en_cat` + `qr_cat` + `ir_cat` + `mt_cat` + `yo_cat` + 0) VIRTUAL,
  `project_total` int(11) GENERATED ALWAYS AS (`ar_project` + `bs1_project` + `bs2_project` + `bu_project` + `ca_project` + `nv_project` + `pv_project` + `en_project` + `qr_project` + `ir_project` + `mt_project` + `yo_project` + 0) VIRTUAL,
  `exam_total` int(11) GENERATED ALWAYS AS (`ar_exam` + `bs1_exam` + `bs2_exam` + `bu_exam` + `ca_exam` + `nv_exam` + `pv_exam` + `en_exam` + `qr_exam` + `ir_exam` + `mt_exam` + `yo_exam` + 0) VIRTUAL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO broadsheet VALUES("1","1902","Bello AbdurRasheed","JS3","21223","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0");
INSERT INTO broadsheet VALUES("2","1901","Akinyemi AbdulMalik","JS3","21223","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0");
INSERT INTO broadsheet VALUES("3","1903","Haroon Muhammad","JS3","21223","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0");
INSERT INTO broadsheet VALUES("4","1905","Muslim Tajudeen","JS3","21223","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0");



