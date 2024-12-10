@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 bg-basic-white dark:text-black focus:border-2 focus:border-primary-violet focus:ring-primary-violet rounded-md shadow-sm']) }}>
