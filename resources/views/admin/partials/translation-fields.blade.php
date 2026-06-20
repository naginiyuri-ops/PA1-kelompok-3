{{--
    ======================================================
    KOMPONEN: Blok Input Terjemahan Bahasa Inggris
    ======================================================
    Partial ini menampilkan section input versi Bahasa Inggris
    di form Admin. Bisa di-include di form create maupun edit.

    Props yang bisa dikirim:
    - $labelId    : Label untuk field "Nama / Judul" (string)
    - $labelDesc  : Label untuk field "Deskripsi / Konten" (string)
    - $nameId     : name attribute untuk field nama/judul (string)
    - $nameDesc   : name attribute untuk field deskripsi (string)
    - $oldId      : old() key untuk field nama/judul (string)
    - $oldDesc    : old() key untuk field deskripsi (string)
    - $valueId    : nilai saat ini untuk edit (string|null)
    - $valueDesc  : nilai saat ini untuk edit (string|null)
    - $textareaDesc : apakah deskripsi menggunakan textarea (bool, default: true)
    - $rowsDesc   : jumlah baris textarea deskripsi (int, default: 5)
--}}

<div class="translation-section" style="
    margin-top: 28px;
    border: 1.5px solid #c6a43b;
    border-radius: 12px;
    overflow: hidden;
    background: #fffdf5;
">
    {{-- Header Section --}}
    <div style="
        background: linear-gradient(135deg, #c6a43b 0%, #e8c84f 100%);
        padding: 10px 18px;
        display: flex;
        align-items: center;
        gap: 10px;
    ">
        <span style="font-size: 1.2rem;">🇬🇧</span>
        <h6 style="
            margin: 0;
            font-size: 0.88rem;
            font-weight: 700;
            color: #fff;
            text-shadow: 0 1px 2px rgba(0,0,0,0.2);
            letter-spacing: 0.5px;
        ">
            VERSI BAHASA INGGRIS (English Version)
            <span style="
                font-weight: 400;
                font-size: 0.75rem;
                opacity: 0.9;
                display: block;
                margin-top: 1px;
            ">Opsional — Isi untuk mendukung fitur ganti bahasa</span>
        </h6>
    </div>

    {{-- Input Fields --}}
    <div style="padding: 18px 20px;">

        {{-- Field Nama / Judul --}}
        @if(isset($labelId) && isset($nameId))
        <div class="mb-3">
            <label style="
                display: block;
                margin-bottom: 6px;
                font-weight: 600;
                font-size: 0.82rem;
                color: #78620d;
            ">
                🇬🇧 {{ $labelId }} <span style="color:#94a3b8; font-weight:400;">(English)</span>
            </label>
            <input
                type="text"
                name="{{ $nameId }}"
                class="form-control"
                value="{{ old($oldId ?? $nameId, $valueId ?? '') }}"
                placeholder="Enter {{ strtolower($labelId) }} in English..."
                style="border-color: #e8d89a; background: #fff;"
            >
        </div>
        @endif

        {{-- Field Deskripsi / Konten --}}
        @if(isset($labelDesc) && isset($nameDesc))
        <div class="mb-3" style="margin-bottom:0;">
            <label style="
                display: block;
                margin-bottom: 6px;
                font-weight: 600;
                font-size: 0.82rem;
                color: #78620d;
            ">
                🇬🇧 {{ $labelDesc }} <span style="color:#94a3b8; font-weight:400;">(English)</span>
            </label>
            @if(($textareaDesc ?? true))
                <textarea
                    name="{{ $nameDesc }}"
                    class="form-control"
                    rows="{{ $rowsDesc ?? 5 }}"
                    placeholder="Enter {{ strtolower($labelDesc) }} in English..."
                    style="border-color: #e8d89a; background: #fff; resize: vertical;"
                >{{ old($oldDesc ?? $nameDesc, $valueDesc ?? '') }}</textarea>
            @else
                <input
                    type="text"
                    name="{{ $nameDesc }}"
                    class="form-control"
                    value="{{ old($oldDesc ?? $nameDesc, $valueDesc ?? '') }}"
                    placeholder="Enter {{ strtolower($labelDesc) }} in English..."
                    style="border-color: #e8d89a; background: #fff;"
                >
            @endif
        </div>
        @endif

    </div>
</div>
