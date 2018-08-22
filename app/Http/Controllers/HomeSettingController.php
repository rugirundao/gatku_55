<?php

namespace App\Http\Controllers;

use Austen\Repositories\ImageRepository;
use Gatku\HomeSetting;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Illuminate\Support\Facades\Log;

class HomeSettingController extends BaseController {

	protected $image;

	public function __construct(ImageRepository $image) {
		$this->image = $image;

        parent::__construct();
	}

	/**
	 * Display a listing of the resource.
	 * GET /homesetting
	 *
	 * @return Response
	 */
	public function index() {
		
		try {
			$homeSettings = HomeSetting::orderBy('id', 'desc')->first();
			//$homeSettings = HomeSetting::all();
		} catch (Exception $e) {
            Bugsnag::notifyException($e);
			return \Response::json(['message' => 'Sorry, home setting could not be retrieved.'], 404);
		}

		return \Response::json($homeSettings, 200);
	}


	/**
	 * Store a newly created resource in storage.
	 * POST /homesetting
	 *
	 * @return Response
	 */
	public function store() {
		try {
            $homeSetting = new HomeSetting;
            $homeSetting->page_title = \Request::get('page_title') ? \Request::get('page_title') : '';
            $homeSetting->logo = \Request::get('logo') ? \Request::get('logo') : '';
            $homeSetting->top_stripe_background_image_url = \Request::get('top_stripe_background_image_url') ? \Request::get('top_stripe_background_image_url') : '';
            $homeSetting->top_stripe_logo_url = \Request::get('top_stripe_logo_url') ? \Request::get('top_stripe_logo_url') : '';
            $homeSetting->button_color = \Request::get('button_color') ? \Request::get('button_color') : '';
            $homeSetting->image = \Request::get('image') ? \Request::get('image') : '';
            $homeSetting->mobile_image = \Request::get('mobile_image') ? \Request::get('mobile_image') : '';
            $homeSetting->image_info = \Request::get('image_info') ? \Request::get('image_info') : '';
            $homeSetting->image_credit = \Request::get('image_credit') ? \Request::get('image_credit') : '';
            $homeSetting->slideshow_text_1 = \Request::get('slideshow_text_1') ? \Request::get('slideshow_text_1') : '';
            $homeSetting->slideshow_text_2 = \Request::get('slideshow_text_2') ? \Request::get('slideshow_text_2') : '';
            $homeSetting->slideshow_text_3 = \Request::get('slideshow_text_3') ? \Request::get('slideshow_text_3') : '';
            $homeSetting->slideshow_text_4 = \Request::get('slideshow_text_4') ? \Request::get('slideshow_text_4') : '';
            $homeSetting->slideshow_text_5 = \Request::get('slideshow_text_5') ? \Request::get('slideshow_text_5') : '';
            $homeSetting->slideshow_text_color_css = \Request::get('slideshow_text_color_css') ? \Request::get('slideshow_text_color_css') : '';
            $homeSetting->slideshow_text_shadow_css = \Request::get('slideshow_text_shadow_css') ? \Request::get('slideshow_text_shadow_css') : '';
            $homeSetting->facebook_url = \Request::get('facebook_url');
            $homeSetting->twitter_url = \Request::get('twitter_url');
            $homeSetting->instagram_url = \Request::get('instagram_url');
            $homeSetting->youtube_url = \Request::get('youtube_url');
            $homeSetting->address_us = \Request::get('address_us') ? \Request::get('address_us') : '';
            $homeSetting->address_au = \Request::get('address_au') ? \Request::get('address_au') : '';
            $homeSetting->email_html = \Request::get('email_html') ? \Request::get('email_html') : '';
            $homeSetting->phone_html = \Request::get('phone_html') ? \Request::get('phone_html') : '' ;
            $homeSetting->desktop_copyright_html = \Request::get('desktop_copyright_html') ? \Request::get('desktop_copyright_html') : '';
            $homeSetting->mobile_copyright_html = \Request::get('mobile_copyright_html')? \Request::get('mobile_copyright_html') : '';
            $homeSetting->contact_image = \Request::get('contact_image') ? \Request::get('contact_image') : '';
            $homeSetting->contact_desktop_logo_url = \Request::get('contact_desktop_logo_url') ? \Request::get('contact_desktop_logo_url') : '';
            $homeSetting->contact_mobile_logo_url = \Request::get('contact_mobile_logo_url') ? \Request::get('contact_mobile_logo_url') : '';
            $homeSetting->contact_title = \Request::get('contact_title') ? \Request::get('contact_title') : '';
            $homeSetting->contact_message = \Request::get('contact_message') ? \Request::get('contact_message') : '';
            $homeSetting->footer_banner_url = \Request::get('footer_banner_url') ? \Request::get('footer_banner_url') : '';
            $homeSetting->contact_desktop_logo_height = \Request::get('contact_desktop_logo_height') ? \Request::get('contact_desktop_logo_height') : 0;
            $homeSetting->contact_mobile_logo_height = \Request::get('contact_mobile_logo_height') ? \Request::get('contact_mobile_logo_height') : 0;
            $homeSetting->additional_images_label_for_product = \Request::get('additional_images_label_for_product') ? \Request::get('additional_images_label_for_product') : '';

            $homeSetting->save();
		} catch (Exception $e) {
            Bugsnag::notifyException($e);
			Log::error($e);

			return \Response::json(['message' => 'Sorry, there was a problem saving the image'], 404);
		}

		return \Response::json(['message' => 'Home setting saved!'], 200);
	}

	
	/**
	 * Update the specified resource in storage.
	 * PUT /homesetting/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /homesetting/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	public function upload() {
		$file = \Request::file('file');
		$upload = $this->image->upload($file, 'img/home-images/');

		if ($upload === false) {
			return \Response::json(['message' => 'Sorry, something went wrong during the upload'], 404);
		}

		return \Response::json($upload['imagePath'], 200);
	}
}
