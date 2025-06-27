
<select onchange="location = this.value" class="text-sm bg-gray-700 text-white rounded px-2 py-1">
    <option value="{{ url('en') }}" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>
        English
    </option>
    <option value="{{ url('my') }}" {{ app()->getLocale() === 'my' ? 'selected' : '' }}>
        မြန်မာ
    </option>
</select>