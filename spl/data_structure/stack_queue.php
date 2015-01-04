<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 04.01.15
 * Time: 02:52
 */

/**
 * compare of stack and queue
 * Stack: LIFO
 * Queue: FIFO
 */

/**
 * init stack
 */
$stack = new SplStack();
$stack[] = 'first_in';
$stack->push('second_in');
$stack->push('third_in');
$stack->push('fourth_in');
$stack[] = 'fifth_in';

/**
 * init queue
 */
$queue = new SplQueue();
$queue->enqueue('first_in');
$queue->enqueue('second_in');
$queue->push('third_in');
$queue[] = 'fourth_in';
$queue[] = 'fifth_in';

echo '<h3>Stack</h3>';
foreach($stack as $value) {
    echo $value . ', ';
}

echo '<h3>Queue</h3>';
foreach($queue as $value) {
    echo $value . ', ';
}

echo "<hr />";

echo "This was popped from the stack: " . $stack->pop() . "<br />";
echo "This was dequeued from the queue: " . $queue->dequeue() . "<br />";

$stack->setIteratorMode(SplStack::IT_MODE_DELETE | SplStack::IT_MODE_LIFO);
$queue->setIteratorMode(SplQueue::IT_MODE_DELETE | SplQueue::IT_MODE_FIFO);

echo '<h3>Stack</h3>';
foreach($stack as $value) {
    echo $value . ', ';
}

echo '<h3>Queue</h3>';
foreach($queue as $value) {
    echo $value . ', ';
}

echo "<hr />";
if($stack->isEmpty() && $queue->isEmpty()) {
    echo "Both stack and queue are empty.";
}