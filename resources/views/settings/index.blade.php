<x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-white">Settings</span>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="w-full">
        <div class="dark:border-gray-700">
            <div class="grid grid-cols-3 w-full">
                <div class="col-span-3">
                    <div class="w-full p-6 rounded-lg">
                        <div class="flex justify-between">
                            <div>
                                <!-- Page Heading -->
                                <h2 class="text-2xl font-bold mb-6">Settings</h2>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <!-- Tabs Navigation and Content Wrapper -->
                            <div x-data="{ activeTab: 'general' }">
                                <!-- Tabs Navigation -->
                                <ul class="flex space-x-4 border-b border-gray-200">
                                    <li @click="activeTab = 'general'"
                                        :class="{ 'border-blue-500 text-blue-500': activeTab === 'general' }"
                                        class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-500 focus:outline-none border-b-2 border-transparent cursor-pointer">
                                        General
                                    </li>
                                    <li @click="activeTab = 'notifications'"
                                        :class="{ 'border-blue-500 text-blue-500': activeTab === 'notifications' }"
                                        class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-500 focus:outline-none border-b-2 border-transparent cursor-pointer">
                                        Notifications
                                    </li>
                                    <li @click="activeTab = 'security'"
                                        :class="{ 'border-blue-500 text-blue-500': activeTab === 'security' }"
                                        class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-500 focus:outline-none border-b-2 border-transparent cursor-pointer">
                                        Security
                                    </li>
                                </ul>

                                <!-- Tabs Content -->
                                <div class="mt-6">
                                    <!-- General Settings -->
                                    <div x-show="activeTab === 'general'" class="space-y-6">
                                        <h2 class="text-xl font-semibold text-gray-800">General Settings</h2>
                                        <form>
                                            <div class="space-y-4">
                                                <div>
                                                    <label for="timezone" class="block text-sm font-medium text-gray-700">Timezone</label>
                                                    <select id="timezone" name="timezone" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                        <option value="UTC">UTC</option>
                                                        <option value="EST">Eastern Standard Time (EST)</option>
                                                        <option value="PST">Pacific Standard Time (PST)</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                                                    <select id="language" name="language" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                        <option value="en">English</option>
                                                        <option value="es">Spanish</option>
                                                        <option value="fr">French</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <button type="submit" class="inline-flex justify-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                                        Save Changes
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Notification Settings -->
                                    <div x-show="activeTab === 'notifications'" class="space-y-6">
                                        <h2 class="text-xl font-semibold text-gray-800">Notification Settings</h2>
                                        <form>
                                            <div class="space-y-4">
                                                <div>
                                                    <label class="flex items-center">
                                                        <input type="checkbox" name="email_notifications" class="form-checkbox h-4 w-4 text-blue-500">
                                                        <span class="ml-2 text-sm text-gray-700">Enable Email Notifications</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="flex items-center">
                                                        <input type="checkbox" name="sms_notifications" class="form-checkbox h-4 w-4 text-blue-500">
                                                        <span class="ml-2 text-sm text-gray-700">Enable SMS Notifications</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <button type="submit" class="inline-flex justify-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                                        Save Changes
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Security Settings -->
                                    <div x-show="activeTab === 'security'" class="space-y-6">
                                        <h2 class="text-xl font-semibold text-gray-800">Security Settings</h2>
                                        <form>
                                            <div class="space-y-4">
                                                <div>
                                                    <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                                                    <input type="password" id="current_password" name="current_password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                </div>
                                                <div>
                                                    <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                                                    <input type="password" id="new_password" name="new_password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                </div>
                                                <div>
                                                    <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                                                    <input type="password" id="confirm_password" name="confirm_password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                </div>
                                                <div>
                                                    <button type="submit" class="inline-flex justify-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                                        Change Password
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
