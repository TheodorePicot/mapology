<x-layouts.mail-layout :title="__('Welcome to Mapology!') . ' - Mapology'" :show-unsubscribe-footer="false">
    <tr>
        <td style="padding: 20px; text-align: left; font-size: 16px; line-height: 1.5; color: #333333; background-color: #ffffff; border-radius: 10px;">
            <h2 style="margin: 0; font-size: 20px; color: #333333;">Hi,</h2>
            <p style="margin: 15px 0; color: #555555;">
                Congratulations on creating your account! You are now ready to embark on an exciting journey exploring the world of maps and geography. Dive into our interactive quizzes and educational content to enhance your knowledge.
            </p>
            <div class="flex justify-center mt-6">
                <a href="{{ route('quizzes') }}" style="display: inline-block; padding: 12px 20px; background-color: #335248; color: #ffffff; text-decoration: none; border-radius: 5px; font-size: 14px; font-weight: bold;">
                    Start Exploring Quizzes
                </a>
                <a href="{{ route('wikis') }}" style="display: inline-block; padding: 12px 20px; background-color: #335248; color: #ffffff; text-decoration: none; border-radius: 5px; font-size: 14px; font-weight: bold; margin-left: 1rem;">
                    Learn More
                </a>
            </div>
            <p style="margin: 15px 0; color: #555555;">
                Want to create your own quizzes and wikis? <a href="{{ route('quizzes.create') }}" style="font-weight: bold; color: #6a9c89; text-decoration: none;">Create a quiz</a> or <a href="{{ route('wikis.create') }}" style="font-weight: bold; color: #6a9c89; text-decoration: none;">create a wiki</a> today!
            </p>
            <p style="margin: 15px 0; color: #555555;">
                Thanks, <br>
                Mapology team
            </p>
        </td>
    </tr>
</x-layouts.mail-layout>
