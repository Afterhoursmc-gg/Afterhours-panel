#![cfg_attr(not(debug_assertions), windows_subsystem = "windows")]

use std::{fs::OpenOptions, io::Write, panic};

fn startup_log(message: &str) {
    let path = std::env::temp_dir().join("afterhours-panel-startup.log");
    if let Ok(mut file) = OpenOptions::new().create(true).append(true).open(path) {
        let _ = writeln!(file, "{}", message);
    }
}

pub fn run() {
    startup_log("Afterhours Panel: process started");
    panic::set_hook(Box::new(|info| {
        startup_log(&format!("Afterhours Panel panic: {info}"));
    }));
    match tauri::Builder::default()
        .plugin(tauri_plugin_opener::init())
        .run(tauri::generate_context!())
    {
        Ok(()) => startup_log("Afterhours Panel: event loop ended"),
        Err(error) => startup_log(&format!("Afterhours Panel runtime error: {error}")),
    }
}
