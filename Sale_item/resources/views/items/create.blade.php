@extends('layouts.app')

@section('title', 'Thêm Item mới')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4">Thêm Item mới</h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('items.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Mã hàng <span class="text-danger">*</span></label>
                    <input type="text" name="item_code" maxlength="6"
                           value="{{ old('item_code') }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tên hàng <span class="text-danger">*</span></label>
                    <input type="text" name="item_name" maxlength="50"
                           value="{{ old('item_name') }}"
                           class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Số lượng</label>
                        <input type="number" name="quantity" step="0.01" min="0"
                               value="{{ old('quantity', 0) }}"
                               class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ngày hết hạn</label>
                        <input type="date" name="expried_date"
                               value="{{ old('expried_date') }}"
                               class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ghi chú</label>
                    <textarea name="note" maxlength="60" rows="2"
                              class="form-control">{{ old('note') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
@endsection
