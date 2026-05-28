@extends('layouts.app')

@section('title', 'Danh sách Item')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">📦 Danh sách Item</h4>
                <a href="{{ route('items.create') }}" class="btn btn-success">
                    + Thêm mới
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Mã hàng</th>
                        <th>Tên hàng</th>
                        <th>Số lượng</th>
                        <th>Ngày hết hạn</th>
                        <th>Ghi chú</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td><strong>{{ $item->item_code }}</strong></td>
                            <td>{{ $item->item_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                {{ $item->expried_date
                                    ? \Carbon\Carbon::parse($item->expried_date)->format('d/m/Y')
                                    : '-' }}
                            </td>
                            <td>{{ $item->note ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Chưa có item nào. Hãy bấm <em>Thêm mới</em> để tạo.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
