<?php

// Non-compliant

class Programmer
{
    public function code()
    {
        return 'coding';
    }
}

class Tester
{
    public function test()
    {
        return 'testing';
    }
}

class ProjectManagement
{
    public function process($member)
    {
        if (is_a($member, 'Programmer')) {
            $member->code();
        } elseif (is_a($member, 'Tester')) {
            $member->test();
        }

        throw new Exception('Invalid input member');
    }
}

$programmer = new Programmer();
$tester = new Tester();
$project = new ProjectManagement();
echo $project->process($programmer);
echo $project->process($tester);

// Compliant

interface Workable
{
    public function work();
}

class Programmer implements Workable
{
    public function work()
    {
        return 'coding';
    }
}

class Tester implements Workable
{
    public function work()
    {
        return 'testing';
    }
}

class ProjectManagement
{
    public function process(Workable $member)
    {
        return $member->work();
    }
}

$programmer = new Programmer();
$tester = new Tester();
$project = new ProjectManagement();
echo $project->process($programmer);
echo $project->process($tester);
