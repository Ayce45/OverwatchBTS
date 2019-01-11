/*--------------------------------------------------------------------------*
 | Copyright (C) 2014 Christopher Kohlhaas                                    |
 |                                                                          |
 | This program is free software; you can redistribute it and/or modify     |
 | it under the terms of the GNU General Public License as published by the |
 | Free Software Foundation. A copy of the license has been included with   |
 | these distribution in the COPYING file, if not go to www.fsf.org         |
 |                                                                          |
 | As a special exception, you are granted the permissions to link this     |
 | program with every library, which license fulfills the Open Source       |
 | Definition as published by the Open Source Initiative (OSI).             |
 *--------------------------------------------------------------------------*/

package org.rapla.components.calendarview;

import java.util.Comparator;

/** Compares to blocks by the starting time.  block1<block2 if 
 * it block1.getStart()< block2.getStart(). */
public class BlockComparator  implements Comparator<Block> {
    public static BlockComparator COMPARATOR = new BlockComparator();
    public int compare(Block b1,Block b2) {
        int result = b1.getStart().compareTo(b2.getStart());
        if (result != 0)
            return result;
        else
            return b1.getName().compareTo(b2.getName());

    }
}




