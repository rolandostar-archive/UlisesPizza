SetKeyDelay, 0
OnMessage(0x219, "notify_change")
DriveGet, dlist, list, REMOVABLE
Lock = 0
Return

notify_change(wParam, lParam, msg, hwnd)
{ ; give the OS two seconds to do whatever (shuffle drivers or whatnot)
    SetTimer, CheckUSBDrives, -750
}

CheckUSBDrives:
;Siempre entra si hubo un cambio en hardware remove/add
DriveGet, nlist, list, REMOVABLE
if (Lock = 1) {
    if (nlist==dlist)
    {
        Send {RControl Down}{F12}{RControl UP}
        Lock = 0
    }
    else
    {
        msgBox, Error
    }
    return
}
else
{
    Loop Parse, nlist
    {
        IfNotInString, dlist, %a_LoopField%
        {
            DriveGet, label, label, %a_LoopField%:\
            for Disk in ComObjGet("winmgmts:").ExecQuery("Select * from Win32_DiskDrive where interfacetype = ""USB""") {
                DeviceId := Disk.PNPDeviceID
                StringSplit DeviceProperties, DeviceId, \&
                SerialNumber := DeviceProperties6 ; The sixth element of the array contains the serial number
                send %SerialNumber%{Enter}
            }
            Lock = 1
        }
        ;msgBox, This
    }
    return
}