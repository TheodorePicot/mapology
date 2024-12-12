<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.front.base')]
class Dashboard extends Component
{
    public $userStats;
    public $recentQuizzes;
    public $createdContent;

    public function mount()
    {
        $this->userStats = $this->getUserStats();
        $this->recentQuizzes = $this->getRecentQuizzes();
        $this->createdContent = $this->getCreatedContent();
    }

    private function getUserStats()
    {
        return [
            'total_quizzes_taken' => 20,
            'average_score' => 75,
            'flags_learned' => 10,
            'countries_learned' => 5,
        ];
    }

    private function getRecentQuizzes()
    {
        return collect([
            collect([
                'id' => 1,
                'title' => 'World countries',
                'score' => 80,
                'countries_learned' => 5,
                'flags_learned' => 10,
                'created_at' => '2022-01-01 00:00:00',
            ]),
            collect([
                'id' => 2,
                'title' => 'European capitals',
                'score' => 70,
                'countries_learned' => 3,
                'flags_learned' => 6,
                'created_at' => '2022-01-02 00:00:00',
            ]),
            collect([
                'id' => 3,
                'title' => 'US states',
                'score' => 85,
                'countries_learned' => 2,
                'flags_learned' => 4,
                'created_at' => '2022-01-03 00:00:00',
            ]),
            collect([
                'id' => 4,
                'title' => 'African countries',
                'score' => 90,
                'countries_learned' => 6,
                'flags_learned' => 8,
                'created_at' => '2022-01-04 00:00:00',
            ]),
        ]);
    }

    private function getCreatedContent()
    {
        return [
            'quizzes' => 5,
            'wikis' => 10,
        ];
    }
}
