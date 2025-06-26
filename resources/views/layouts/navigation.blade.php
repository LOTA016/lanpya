<form method="POST" action="{{ route('locale.switch') }}">
    @csrf
    <select name="locale" onchange="this.form.submit()" class="text-sm">
        <option value="en" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>English</option>
        <option value="my" {{ app()->getLocale() === 'my' ? 'selected' : '' }}>မြန်မာ</option>
    </select>
</form>
