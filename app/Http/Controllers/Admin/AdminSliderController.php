<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        // Check maximum 6 sliders
        if (Slider::count() >= 6) {
            return redirect()->route('admin.slider.index')->with('error', 'Batas maksimal 6 foto slider telah tercapai. Hapus beberapa foto untuk menambahkan yang baru.');
        }

        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        if (Slider::count() >= 6) {
            return redirect()->route('admin.slider.index')->with('error', 'Batas maksimal 6 foto slider telah tercapai.');
        }

        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data = $request->only(['title', 'subtitle']);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('slider', 'public');
        }

        Slider::create($data);

        return redirect()->route('admin.slider.index')->with('success', 'Foto slider berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data = $request->only(['title', 'subtitle']);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($slider->image_path && Storage::disk('public')->exists($slider->image_path)) {
                Storage::disk('public')->delete($slider->image_path);
            }
            $data['image_path'] = $request->file('image')->store('slider', 'public');
        }

        $slider->update($data);

        return redirect()->route('admin.slider.index')->with('success', 'Foto slider berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        if ($slider->image_path && Storage::disk('public')->exists($slider->image_path)) {
            Storage::disk('public')->delete($slider->image_path);
        }

        $slider->delete();

        return redirect()->route('admin.slider.index')->with('success', 'Foto slider berhasil dihapus.');
    }
}
