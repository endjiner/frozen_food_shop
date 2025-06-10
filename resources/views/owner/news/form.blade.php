<div class="mb-3">
    <label class="form-label">Judul Berita</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $news->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Konten</label>
    <textarea name="content" class="form-control" rows="5" required>{{ old('content', $news->content ?? '') }}</textarea>
</div>

<div class="d-grid">
    <button type="submit" class="btn btn-success">{{ $button }}</button>
</div>