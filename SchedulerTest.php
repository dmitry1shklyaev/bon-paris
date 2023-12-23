<?php
use PHPUnit\Framework\TestCase;
class SchedulerTest extends TestCase
{
    public function testScheduleAppointment()
    {
        $mysqli = $this->createMock(mysqli::class);
        $mysqli->expects($this->once())
            ->method('query')
            ->willReturn(true);

        $scheduler = new Scheduler($mysqli);

        $result = $scheduler->scheduleAppointment(1, 'master', '8:00 - 14:00', 'client', 'Маникюр');
        $this->assertEquals('Запись успешно добавлена', $result);
    }
}