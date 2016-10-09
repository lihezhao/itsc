<?php
class ExifReader {

	/**
	 * 获取图象信息的函数
	 * 一个全面获取图象信息的函数
	 * @access public
	 * @param string $img 图片路径
	 * @return array
	 */
	function GetImageInfoVal($ImageInfo,$val_arr) {
		$InfoVal  =  "未知";
		foreach($val_arr as $name=>$val) {
			if ($name==$ImageInfo) {
				$InfoVal  =  &$val;
				break;
			}
		}
		return $InfoVal;
	}
	
	public static function read($fileName) {
		$Orientation		= array("", "top left side", "top right side", "bottom right side", "bottom left side", "left side top", "right side top", "right side bottom", "left side bottom");
		$ResolutionUnit		= array("", "", "英寸", "厘米");
		$YCbCrPositioning	= array("", "the center of pixel array", "the datum point");
		$ExposureProgram	= array("未定义", "手动", "标准程序", "光圈先决", "快门先决", "景深先决", "运动模式", "肖像模式", "风景模式");
		$MeteringMode_arr	= array(
				"0"		=> "未知",
				"1"		=> "平均",
				"2"		=> "中央重点平均测光",
				"3"		=> "点测",
				"4"		=> "分区",
				"5"		=> "评估",
				"6"		=> "局部",
				"255"	=> "其他"
		);
		$Lightsource_arr	= array(
				"0"		=> "未知",
				"1"		=> "日光",
				"2"		=> "荧光灯",
				"3"		=> "钨丝灯",
				"10"	=> "闪光灯",
				"17"	=> "标准灯光A",
				"18"	=> "标准灯光B",
				"19"	=> "标准灯光C",
				"20"	=> "D55",
				"21"	=> "D65",
				"22"	=> "D75",
				"255"	=> "其他"
		);
		$Flash_arr			= array(
				"0"		=> "flash did not fire",
				"1"		=> "flash fired",
				"5"		=> "flash fired but strobe return light not detected",
				"7"		=> "flash fired and strobe return light detected",
		);
		
		
		@$exifData = exif_read_data($fileName, "IFD0");
		
		$exif = Exif::model()->find('pathName=:pathName', array(':pathName'=> $fileName));
		if ($exif) {
		} else {
			$exif = new Exif();
			$exif->pathName = $fileName;
		}
		
		if ($exifData === false) {
			$exif->userComment = "没有图片EXIF信息";
		} else {
			$exifData = exif_read_data($fileName, 0, true);
			$exif->fileName					= $exifData['FILE']['FileName'];
			$exif->fileType					= $exifData['FILE']['FileType'];
			$exif->mimeType					= $exifData['FILE']['MimeType'];
			$exif->fileSize					= $exifData['FILE']['FileSize'];
			$exif->fileDateTime				= $exifData['FILE']['FileDateTime'];
			if (isset($exifData['IFD0']['ImageDescription'])) {
				$exif->imageDescription		= $exifData['IFD0']['ImageDescription']; 		
			}
			$exif->make						= $exifData['IFD0']['Make'];
			$exif->model					= $exifData['IFD0']['Model'];
			$exif->orientation				= $exifData['IFD0']['Orientation'];
			$exif->xResolution				= $exifData['IFD0']['XResolution'];
			$exif->yResolution				= $exifData['IFD0']['YResolution'];
			$exif->resolutionUnit			= $exifData['IFD0']['ResolutionUnit'];
			if (isset($exifData['IFD0']['Software'])) {
				$exif->software				= $exifData['IFD0']['Software'];
			}
			$exif->dateTime					= $exifData['IFD0']['DateTime'];
			$exif->artist					= $exifData['IFD0']['Artist'];
			$exif->ycbCrPositioning			= $exifData['IFD0']['YCbCrPositioning'];
			$exif->copyright				= $exifData['IFD0']['Copyright'];
			if (isset($exifData['COMPUTED']['Copyright.Photographer'])) {
				$exif->copyrightPhotographer= $exifData['COMPUTED']['Copyright.Photographer'];
			}
			if (isset($exifData['COMPUTED']['Copyright.Editor'])) {
				$exif->copyrightEditor			= $exifData['COMPUTED']['Copyright.Editor'];
			}
			$exif->exifVersion				= $exifData['EXIF']['ExifVersion'];
			$exif->flashPixVersion			= $exifData['EXIF']['FlashPixVersion'];
			$exif->dateTimeOriginal			= $exifData['EXIF']['DateTimeOriginal'];
			$exif->dateTimeDigitized		= $exifData['EXIF']['DateTimeDigitized'];
			$exif->height					= $exifData['COMPUTED']['Height'];
			$exif->width					= $exifData['COMPUTED']['Width'];
			$exif->apertureValue			= $exifData['EXIF']['ApertureValue'];
			$exif->shutterSpeedValue		= $exifData['EXIF']['ShutterSpeedValue'];
			$exif->apertureFNumber			= $exifData['COMPUTED']['ApertureFNumber'];
			if (isset($exifData['EXIF']['MaxApertureValue'])) {
				$exif->maxApertureValue		= $exifData['EXIF']['MaxApertureValue'];
			}
			$exif->exposureTime				= $exifData['EXIF']['ExposureTime'];
			$exif->fNumber					= $exifData['EXIF']['FNumber'];
			$exif->meteringMode				= $exifData['EXIF']['MeteringMode'];
			if (isset($exifData['EXIF']['LightSource'])) {
				$exif->lightSource			= $exifData['EXIF']['LightSource'];
			}
			$exif->flash					= $exifData['EXIF']['Flash'];
			$exif->exposureMode				= $exifData['EXIF']['ExposureMode'];
			$exif->whiteBalance				= $exifData['EXIF']['WhiteBalance'];
			$exif->exposureProgram			= $exifData['EXIF']['ExposureProgram'];
			$exif->exposureBiasValue		= $exifData['EXIF']['ExposureBiasValue'];
			$exif->ISOSpeedRatings			= $exifData['EXIF']['ISOSpeedRatings'];
			$exif->componentsConfiguration	= $exifData['EXIF']['ComponentsConfiguration'];
			if (isset($exifData['EXIF']['CompressedBitsPerPixel'])) {
				$exif->compressedBitsPerPixel	= $exifData['EXIF']['CompressedBitsPerPixel'];
			}
			if (isset($exifData['COMPUTED']['FocusDistance'])) {
				$exif->focusDistance			= $exifData['COMPUTED']['FocusDistance'];
			}
			$exif->focalLength				= $exifData['EXIF']['FocalLength'];
			if (isset($exifData['EXIF']['FocalLengthIn35mmFilm'])) {
				$exif->focalLengthIn35mmFilm	= $exifData['EXIF']['FocalLengthIn35mmFilm'];
			}
			$exif->userCommentEncoding		= $exifData['COMPUTED']['UserCommentEncoding'];
			$exif->userComment				= $exifData['COMPUTED']['UserComment'];
			$exif->colorSpace				= $exifData['EXIF']['ColorSpace'];
			$exif->exifImageLength			= $exifData['EXIF']['ExifImageLength'];
			$exif->exifImageWidth			= $exifData['EXIF']['ExifImageWidth'];
			if (isset($exifData['EXIF']['FileSource'])) {
				$exif->fileSource				= $exifData['EXIF']['FileSource'];
			}
			if (isset($exifData['EXIF']['SceneType'])) {
				$exif->sceneType				= $exifData['EXIF']['SceneType'];
			}
			$exif->thumbnailFileType		= $exifData['COMPUTED']['Thumbnail.FileType'];
			$exif->thumbnailMimeType		= $exifData['COMPUTED']['Thumbnail.MimeType'];
		}
		
		return $exif;
	}
	
}