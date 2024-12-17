<x-layouts.mail-layout :title="__('Welcome to Mapology'). '!'. ' - Mapology'" :show-unsubscribe-footer="false">
    <tr>
        <td style="padding: 20px; text-align: left; font-size: 16px; line-height: 1.5; color: #333333; background-color: #ffffff; border-radius: 10px;">
            <h2 style="margin: 0; font-size: 20px; color: #333333;">{{ __('Hi') }},</h2>
            <p style="margin: 15px 0; color: #555555;">
                {{ __('mail.welcome_first_line') }}
            </p>
            <div class="flex justify-center mt-6">
                <a href="{{ route('quizzes') }}" style="display: inline-block; padding: 12px 20px; background-color: #335248; color: #ffffff; text-decoration: none; border-radius: 5px; font-size: 14px; font-weight: bold;">
                    {{ __('Start exploring quizzes') }}
                </a>
                <a href="{{ route('wikis') }}" style="display: inline-block; padding: 12px 20px; background-color: #335248; color: #ffffff; text-decoration: none; border-radius: 5px; font-size: 14px; font-weight: bold; margin-left: 1rem;">
                    {{ __('Start exploring wikis') }}
                </a>
            </div>
            <p style="margin: 15px 0; color: #555555;">
                {{ __('mail.welcome_second_line') }} <a href="{{ route('quizzes.create') }}" style="font-weight: bold; color: #6a9c89; text-decoration: none;">{{ __('Create a quiz') }}</a> {{ __('or') }} <a href="{{ route('wikis.create') }}" style="font-weight: bold; color: #6a9c89; text-decoration: none;">{{ __('create a wiki') }}</a> {{ __('today') }}!
            </p>
            <p style="margin: 15px 0; color: #555555;">
                {{ __('Thanks') }}, <br>
                {{ __('Mapology team') }}
            </p>
        </td>
    </tr>
</x-layouts.mail-layout>
