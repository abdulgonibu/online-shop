<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sliders = Slider::latest()->get();

        return view('admin.slider.manage', compact('sliders'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|min:5|max:20',
            'sub_title' => 'required|min:5|max:20',
            'image'     => 'required',
            'url'       => 'required',
            'start'     => 'required',
            'end'       => 'required',
        ]);


        $slider = null;
        try {


            $image    = $request->file('image');
            $fileEx   = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis.') . $fileEx;
            $image->move(public_path('uploads/slider/'), $fileName);

            $slider = Slider::create([
                'title'     => $request->title,
                'sub_title' => $request->sub_title,
                'image'     => $fileName,
                'url'       => $request->url,
                'start'     => $request->start,
                'end'       => $request->end,
            ]);
        } catch (Exception $exception) {
            $slider = false;
        }

        if ($slider) {
            setMessage('success', 'Yay! A slider has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new slider.');
        }
        return redirect()->back();
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $id       = base64_decode($id);
        $category = Category::find($id);

        return view('admin.slider.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $category = Category::find($id);

        $request->validate([
            'name' => 'required|min:5|max:20',
        ]);

        $success = null;
        try {
            $name    = $request->name;
            $success = $category->update([
                'name' => $name,
                'slug' => slugify($name)
            ]);
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A category has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update category.');
        }
        return redirect()->back();
    }

    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $slider         = Slider::find($id);
        $slider->status = $status;
        $slider->save();
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $id     = base64_decode($id);
        $slider = Slider::find($id);
        $slider->delete();
        setMessage('success', 'Slider has been successfully deleted!');
        return redirect()->back();
    }
}
