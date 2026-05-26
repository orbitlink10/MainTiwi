@extends('layouts.admin')
@section('title', 'FAQs')

@section('content')
<div class="section-head">
    <h2>Manage FAQs</h2>
    <a class="button" href="{{ route('admin.faqs.create') }}">Add FAQ</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Question</th>
            <th>Sort</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse($faqs as $faq)
            <tr>
                <td>
                    <strong>{{ $faq->question }}</strong>
                    <small>{{ Str::limit($faq->answer, 110) }}</small>
                </td>
                <td>{{ $faq->sort_order }}</td>
                <td><span class="admin-status @if($faq->status) active @endif">{{ $faq->status ? 'Active' : 'Inactive' }}</span></td>
                <td class="inline-actions">
                    <a href="{{ route('admin.faqs.edit', $faq) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}">
                        @csrf
                        @method('DELETE')
                        <button class="danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">No FAQs yet.</td></tr>
        @endforelse
    </tbody>
</table>
<div class="pagination">{{ $faqs->links() }}</div>
@endsection
