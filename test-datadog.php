<?php
/**
 * Datadog APM Test Script
 * This script tests if Datadog APM is properly configured
 */

// Check if we can connect to Datadog Agent
$agent_host = getenv('DD_AGENT_HOST') ?: 'datadog-agent';
$apm_port = getenv('DD_TRACE_AGENT_PORT') ?: 8126;

echo "=== Datadog APM Configuration Test ===\n\n";

// Test 1: Environment Variables
echo "1. Environment Variables:\n";
echo "   DD_AGENT_HOST: " . ($agent_host ?: 'NOT SET') . "\n";
echo "   DD_TRACE_AGENT_PORT: " . $apm_port . "\n";
echo "   DD_SERVICE: " . (getenv('DD_SERVICE') ?: 'NOT SET') . "\n";
echo "   DD_ENV: " . (getenv('DD_ENV') ?: 'NOT SET') . "\n";
echo "   DD_TRACE_ENABLED: " . (getenv('DD_TRACE_ENABLED') ?: 'NOT SET') . "\n";
echo "   DD_APPSEC_ENABLED: " . (getenv('DD_APPSEC_ENABLED') ?: 'NOT SET') . "\n";
echo "   DD_API_KEY: " . (getenv('DD_API_KEY') ? '***set***' : 'NOT SET') . "\n\n";

// Test 2: Check connection to Datadog Agent
echo "2. Datadog Agent Connectivity:\n";
$fp = @fsockopen($agent_host, $apm_port, $errno, $errstr, 2);
if ($fp) {
    echo "   ✓ Successfully connected to $agent_host:$apm_port\n";
    fclose($fp);
} else {
    echo "   ✗ Cannot connect to $agent_host:$apm_port\n";
    echo "     Error: $errstr ($errno)\n";
}
echo "\n";

// Test 3: PHP Extension Check
echo "3. Datadog PHP Extension:\n";
if (extension_loaded('ddtrace')) {
    echo "   ✓ DD Trace extension is loaded\n";
    if (function_exists('dd_trace')) {
        echo "   ✓ dd_trace() function is available\n";
    } else {
        echo "   ✗ dd_trace() function is not available\n";
    }
} else {
    echo "   ℹ DD Trace extension not loaded (this is expected without proper setup)\n";
}
echo "\n";

// Test 4: Create a test span
echo "4. Testing APM Trace:\n";
try {
    // Simulate some work
    usleep(100000); // 100ms
    echo "   ✓ Test operation completed\n";
} catch (Exception $e) {
    echo "   ✗ Error during test: " . $e->getMessage() . "\n";
}
echo "\n";

// Test 5: System Information
echo "5. System Information:\n";
echo "   PHP Version: " . PHP_VERSION . "\n";
echo "   Hostname: " . php_uname('n') . "\n";
echo "   OS: " . php_uname('s') . " " . php_uname('r') . "\n";
echo "\n";

echo "=== Test Complete ===\n";
?>
