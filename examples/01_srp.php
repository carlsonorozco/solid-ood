<?php

// Non-compliant

class Report
{
    public function getTitle()
    {
        return 'SonarQube';
    }

    public function getDate()
    {
        return '2017-10-09'
    }

    public function getContents()
    {
        return [
            'title' => $this->getTitle(),
            'date' => $this->getDate(),
        ];
    }

    public function formatJson()
    {
        return $this->getContents();
    }
}

$report = new Report();
echo $report->formatJson();

// Compliant

class Report
{
    public function getTitle()
    {
        return 'SonarQube';
    }

    public function getDate()
    {
        return '2017-10-09'
    }

    public function getContents()
    {
        return [
            'title' => $this->getTitle(),
            'date' => $this->getDate(),
        ];
    }
}

interface ReportFormattable
{
    public function format(Report $report);
}
class JsonReportFormatter implements ReportFormattable
{
    public function format(Report $report)
    {
        return json_encode($report->getContents());
    }
}

$report = new Report();
$output = new JsonReportFormatter();
echo $output->format($report);
